<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\CustomerUser;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;

class VendorReportController extends Controller
{
    

    public function vendor_id() {
        return CustomerUser::where('user_id',Auth::id())->pluck('customer_id')->first();
        
    }
    public function company_id() {
        return Costomers::where('id',$this->vendor_id())->pluck('company_id')->first();
    }
    /**
     * @param Request $request
     * 
     * @return void
     */
    public function register_orders(Request $request)
    {

        $vendor_id = $this->vendor_id();
        $from = '';
        $to = '';
        
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
       $company_id = $this->company_id();
        $orders = Order::where('comapny_id',$company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('supplier_id',  $vendor_id);
                }
            })
            ->with('exact_details')->whereHas('exact_details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
        $orders = $orders->groupBy('supplier_id');
        
        $categories = Costomers::where('company_id',$company_id)->get();
        return view('v1.colorpro.customer.reports.po',compact('orders','categories'));
    }

    public function register_pdf(Request $request)
    {

        $vendor_id = $this->vendor_id();
        $from = '';
        $to = '';
        
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        
        $orders = Order::where('comapny_id',$this->company_id())
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('supplier_id',  $vendor_id);
                }
            })
            ->with('exact_details')->whereHas('exact_details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
            $orders = $orders->groupBy('supplier_id');

            $date = Carbon::now()->format('d/m/Y');

            // return $company;
            $company = CompanyUser::where('company_id',$this->company_id())->first();
            $pdf = PDF::loadView('pdf.po', compact('orders','company','date','from','to') );
            $pdf->setPaper('A4', 'landscape'); 
            return $pdf->stream('customers.pdf');

        
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function po_orders(Request $request)
    {

        $vendor_id = $this->vendor_id();
        $from = '';
        $to = '';
        
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        $company_id = $this->company_id();
        $orders = Order::where('comapny_id',$company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('supplier_id',  $vendor_id);
                }
            })
            ->with('details')->whereHas('details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
                // $q->where();
            })->get();
            $party = $this->vendor_id();
            $data = DB::table('order_details as ordd')
            ->join('orders as ord', 'ordd.order_id', '=', 'ord.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('co.id', '=',$party)
            ->whereRaw('IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) > 0')
            ->select(
                'ordd.*',
                'ordd.id as order_detail_id',
                'ord.order_number as order_no',
                'ord.order_date',
                'ord.tax_percent',
                'ord.tax_name',
                'ord.pnf_total',
                'ord.courrier_charge',
                'ite.part_no',
                'ite.over_reciept_percentage',  
                'ite.name as item',
                'lkv.lookup_value as uom',
                'co.name as vendor_name',
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as mir_quantity"),
                DB::raw(" IFNULL(ordd.recieved_quantity,0) as cumlative_qty")
                );
                $orders = $data->get();
         $orders = $orders->groupBy('supplier_id');

        
        $categories = Costomers::where('company_id',$company_id)->get();
        return view('v1.colorpro.customer.reports.pending',compact('orders','categories'));
    }

    public function po_pdf(Request $request)
    {

        $vendor_id = $this->vendor_id();
        $from = '';
        $to = '';
        
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        
        $orders = Order::where('comapny_id',$this->company_id())
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('supplier_id',  $vendor_id);
                }
            })
            ->with('details')->whereHas('details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
            $orders = $orders->groupBy('supplier_id');

            $date = Carbon::now()->format('d/m/Y');
            $company = CompanyUser::where('company_id',$this->company_id())->first();
            // return $company;
            $pdf = PDF::loadView('pdf.pending', compact('orders','company','date','from','to') );
            $pdf->setPaper('A4', 'landscape'); 
            return $pdf->stream('customers.pdf');

        
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function mir(Request $request)
    {

        $vendor_id = $this->vendor_id();
        $from = '';
        $to = '';
        
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }

        $company_id = $this->company_id();
        $orders = Order::where('comapny_id',$company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('supplier_id',  $vendor_id);
                }
            })
            ->with('exact_details.exact_reciept')->whereHas('exact_details.exact_reciept', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
         $orders = $orders->groupBy('supplier_id');
        
        $categories = Costomers::where('company_id',$company_id)->get();
        return view('v1.colorpro.customer.reports.mir',compact('orders','categories'));
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function mir_pdf(Request $request)
    {

        $vendor_id = $this->vendor_id();
        $from = '';
        $to = '';
        
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }

        
        $orders = Order::where('comapny_id',$this->company_id())
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('supplier_id',  $vendor_id);
                }
            })
            ->with('exact_details.exact_reciept')->whereHas('exact_details.exact_reciept', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
         $orders = $orders->groupBy('supplier_id');
        
        $date = Carbon::now()->format('d/m/Y');
        $company = CompanyUser::where('company_id',$this->company_id())->first();
        // return $company;
        $pdf = PDF::loadView('pdf.mir', compact('orders','company','date','from','to') );
        $pdf->setPaper('A4', 'landscape'); 
        return $pdf->stream('customers.pdf');
    }
}
