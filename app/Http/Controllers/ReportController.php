<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\LookupMaster;
use App\Order;
use App\OrderDetails;
use App\OrderReceiptHeader;
use App\Stock;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;



class ReportController extends Controller
{
    public function stock(Request $request)
    {
        $category_id = '';
        if($request->has('category_id')){
            $category_id = $request->category_id;
        }

        $categories = LookupMaster::where('lookup_key','ITEM CATEGORY')->get();

        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();

        $stocks = Stock::where('company_id',$company_id)->with('item')->whereHas('item', function($q) use($category_id){
            if($category_id != ''){
                $q->where('category_id',$category_id);
            }
        })->paginate(2);
        return view('v1.colorpro.company.reports.stock',compact('stocks','categories'));
    }
    public function stock_pdf()
    {

        if($company = CompanyUser::where('user_id',Auth::id())->first()){
            $date = Carbon::now()->format('d/m/Y');

            // return $company;
            $stocks = Stock::where('company_id',$company->company_id)->get();
            $total = 0;
            foreach($stocks as $stock){
                $total = $total + $stock->value;  
            }
            $pdf = PDF::loadView('pdf.stock', compact('stocks','company','date','total') );
            $pdf->setPaper('A4', 'portrait'); 
            return $pdf->stream('customers.pdf');
        }

        
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function register_orders(Request $request)
    {

        $vendor_id = '';
        $from = '';
        $to = '';
        if($request->has('vendor_id')){
            $vendor_id = $request->vendor_id;
        }
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $orders = Order::where('comapny_id',$company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('suppier_id',  $vendor_id);
                }
            })
            ->with('exact_details')->whereHas('exact_details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
        $orders = $orders->groupBy('suppier_id');
        
        $categories = Costomers::where('company_id',$company_id)->get();
        return view('v1.colorpro.company.reports.po',compact('orders','categories'));
    }

    public function register_pdf(Request $request)
    {

        $vendor_id = '';
        $from = '';
        $to = '';
        if($request->has('vendor_id')){
            $vendor_id = $request->vendor_id;
        }
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        $company = CompanyUser::where('user_id',Auth::id())->first();
        $orders = Order::where('comapny_id',$company->company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('suppier_id',  $vendor_id);
                }
            })
            ->with('exact_details')->whereHas('exact_details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
            $orders = $orders->groupBy('suppier_id');

            $date = Carbon::now()->format('d/m/Y');

            // return $company;
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

        $vendor_id = '';
        $from = '';
        $to = '';
        if($request->has('vendor_id')){
            $vendor_id = $request->vendor_id;
        }
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $orders = Order::where('comapny_id',$company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('suppier_id',  $vendor_id);
                }
            })
            ->with('details')->whereHas('details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
        $orders = $orders->groupBy('suppier_id');
        
        $categories = Costomers::where('company_id',$company_id)->get();
        return view('v1.colorpro.company.reports.pending',compact('orders','categories'));
    }

    public function po_pdf(Request $request)
    {

        $vendor_id = '';
        $from = '';
        $to = '';
        if($request->has('vendor_id')){
            $vendor_id = $request->vendor_id;
        }
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }
        $company = CompanyUser::where('user_id',Auth::id())->first();
        $orders = Order::where('comapny_id',$company->company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('suppier_id',  $vendor_id);
                }
            })
            ->with('details')->whereHas('details', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
            $orders = $orders->groupBy('suppier_id');

            $date = Carbon::now()->format('d/m/Y');

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

        $vendor_id = '';
        $from = '';
        $to = '';
        if($request->has('vendor_id')){
            $vendor_id = $request->vendor_id;
        }
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }

        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $orders = Order::where('comapny_id',$company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('suppier_id',  $vendor_id);
                }
            })
            ->with('exact_details.exact_reciept')->whereHas('exact_details.exact_reciept', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })->get();
         $orders = $orders->groupBy('suppier_id');
        
        $categories = Costomers::where('company_id',$company_id)->get();
        return view('v1.colorpro.company.reports.mir',compact('orders','categories'));
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function mir_pdf(Request $request)
    {
        
        $vendor_id = '';
        $from = '';
        $to = '';
        if($request->has('vendor_id')){
            $vendor_id = $request->vendor_id;
        }
        if($request->has('from')){
            $from = $request->from;
        }
        if($request->has('to')){
            $to = $request->to;
        }

        $company = CompanyUser::where('user_id',Auth::id())->first();
         $orders = Order::where('comapny_id',$company->company_id)
            ->where(function ($query) use ($vendor_id) {
                if($vendor_id != ''){
                    $query->where('suppier_id',  $vendor_id);
                }
            })
            ->with('exact_details.exact_reciept')
            ->whereHas('exact_details.exact_reciept', function($q) use($from, $to) {
                if($from != '' && $to != ''){
                    $q->whereBetween('delivery_date', [$from, $to]);
                }
            })
            ->get();
         $orders = $orders->groupBy('suppier_id');
        
        $date = Carbon::now()->format('d/m/Y');

        // return $company;
        $pdf = PDF::loadView('pdf.mir', compact('orders','company','date','from','to') );
        $pdf->setPaper('A4', 'landscape'); 
        return $pdf->stream('customers.pdf');
    }

    /**
     * @param Request $request
     * 
     * @return void
     */
    public function mir_single_pdf(Request $request, $id)
    {
        $header = OrderReceiptHeader::find($id);
        $details = DB::table('order_receipt_details as orcd')
            ->join('orders as ord', 'orcd.order_id', '=', 'ord.id')
            ->join('order_details as ordd', 'orcd.order_detail_id', '=', 'ordd.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('orcd.order_receipt_header_id', '=',$id)
            // ->whereRaw('IFNULL(orcd.recieved_quantity,0) - (IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0) + IFNULL(orcd.rework_quantity,0) + IFNULL(orcd.rejected_quantity,0)) > 0')
            ->select(
                'orcd.*',
                'ordd.id as order_detail_id',
                'ordd.quantity as quantity',
                'ordd.discount',
                'ordd.rate as po_rate',
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
                'orcd.recieved_quantity as recieved_qty',
                'orcd.id as order_receipt_id',
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as po_quantity"),
                )->get();
                 $order_details = $details->groupBy('order_no');
                $resArr = [];
                foreach($order_details as $poKey => $poVal){
                    foreach($poVal as $item){
                        $total = $item->rate * (floatval($item->accepted_quantity) + floatval($item->conditionally_accepted_quantity));
                        $item->subtotal = $total;
                        $resObj = ['order_no' => $poKey, 'order_date' => $item->order_date, 'detail_data' => $item];
                    }
                    array_push($resArr,$resObj);
                }
                $header->t_date = Carbon::now()->format('d-m-Y');
                 

                //  return $mir_data = ['header' => $header, 'details' => $resArr];
        // return view('pdf.demo');
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
         $company = Company::where('id',$company_id)->first();
        $pdf = PDF::loadView('pdf.mir_single',compact('header','resArr','company'));
        $pdf->setPaper('A4', 'landscape'); 
        return $pdf->stream('customers.pdf');
    }
}
