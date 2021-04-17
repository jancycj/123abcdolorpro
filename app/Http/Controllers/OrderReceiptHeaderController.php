<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Helpers\DocNo;
use App\OrderDetails;
use App\OrderReceiptDetails;
use App\OrderReceiptHeader;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class OrderReceiptHeaderController extends Controller
{

    public function recieptData(Request $request)
    {
        if($request->has('order_no') && $request->has('party')){
            $order_no = $request->order_no;
            $party = $request->party;
            $data = DB::table('order_details as ordd')
            ->join('orders as ord', 'ordd.order_id', '=', 'ord.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('ord.order_number', '=',$order_no)  
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
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as mir_quantity"),
                DB::raw(" IFNULL(ordd.recieved_quantity,0) as cumlative_qty")

                );

            return $data->get();
            
        }
        if($request->has('party')){
            $party = $request->party;
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
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as mir_quantity"),
                DB::raw(" IFNULL(ordd.recieved_quantity,0) as cumlative_qty")
                );

            return $data->get();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        
        $mir_detials = $request->details;
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $mir = new OrderReceiptHeader;
        $mir->company_id                = $company_id;
        $mir->mir_no                    = DocNo::getDocNumberString('mirp',1);
        $mir->mir_date                  = Carbon::now();
        $mir->vendor_id                 = $request->has('vendor_id') ? $request->vendor_id: '';
        $mir->vendor_dc_no                      = $request->has('vendor_dc_no') ? $request->vendor_dc_no: '';
        $mir->vendor_dc_date                        = $request->has('vendor_dc_date') ? $request->vendor_dc_date: '';
        $mir->vendor_invoice_no                     = $request->has('vendor_invoice_no') ? $request->vendor_invoice_no: '';
        $mir->vendor_invoice_date                       = $request->has('vendor_invoice_date') ? $request->vendor_invoice_date: '';
        $mir->gate_entry_no                     = $request->has('gate_entry_no') ? $request->gate_entry_no: '';
        $mir->gate_entry_date                       = $request->has('gate_entry_date') ? $request->gate_entry_date: '';
        // $mir->p_and_f                       = $request->has('p_and_f') ? $request->p_and_f: '';
        $mir->p_and_f                       = $request->has('other_charges') ? $request->other_charges: '';
        $mir->courrier                      = $request->has('courrier') ? $request->courrier: '';
        $mir->total_bill_amount                     = $request->has('total_bill_amount') ? $request->total_bill_amount: '';
        $mir->created_by                        = Auth::id();
        $mir->save();
        $mir_id = $mir->id;
        // $mird = new OrderReceiptDetails;
        foreach($mir_detials as $mir_detail){
            $mird = new OrderReceiptDetails;
            $mird->order_receipt_header_id  = $mir_id;
            $mird->order_id                 = isset($mir_detail['order_id']) ? $mir_detail['order_id'] : '';
            $mird->item_id                 = isset($mir_detail['item_id']) ? $mir_detail['item_id'] : '';
            $mird->order_detail_id                 = isset($mir_detail['order_detail_id']) ? $mir_detail['order_detail_id'] : '';
            $mird->recieved_quantity        = isset($mir_detail['recieved_qty']) ? $mir_detail['recieved_qty'] : '';
            $mird->conversion_factor        = isset($mir_detail['conversion_factor']) ? $mir_detail['conversion_factor'] : '';
            $mird->rate                     = isset($mir_detail['sub_total']) ? $mir_detail['sub_total'] : '';
            $mird->tax_name                 = isset($mir_detail['tax_name']) ? $mir_detail['tax_name'] : '';
            $mird->tax_value                = isset($mir_detail['tax_percent']) ? $mir_detail['tax_percent'] : '';
            // $mird->tcs = isset($mir_detail['order_id']) ? $mir_detail['order_id'] : '';
            $mird->uom                      = isset($mir_detail['uom']) ? $mir_detail['uom'] : '';
            $mird->created_by               = Auth::id();
            $mird->save();
            if(isset($mir_detail['order_detail_id'])){
                $ordd = OrderDetails::where('id',$mir_detail['order_detail_id'])->first();
                $ordd->recieved_quantity = $ordd->recieved_quantity + $mird->recieved_quantity ;
                $ordd->save();
            }

            
        }
        $doc = DocNo::updateDoc('mirp',1);
        return $mir;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderReceiptHeader  $orderReceiptHeader
     * @return \Illuminate\Http\Response
     */
    public function show($orderReceiptHeader)
    {
        $header = OrderReceiptHeader::find($orderReceiptHeader);
        $details = DB::table('order_receipt_details as orcd')
            ->join('orders as ord', 'orcd.order_id', '=', 'ord.id')
            ->join('order_details as ordd', 'orcd.order_detail_id', '=', 'ordd.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('orcd.order_receipt_header_id', '=',$orderReceiptHeader)
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
                'orcd.recieved_quantity as recieved_qty',
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) + IFNULL(orcd.recieved_quantity,0) as mir_quantity"),
                DB::raw(" IFNULL(ordd.recieved_quantity,0) - IFNULL(orcd.recieved_quantity,0) as cumlative_qty")
                )->get();
        // $details = OrderReceiptDetails::where('order_receipt_header_id',$orderReceiptHeader)->get();

        return ['header' => $header, 'details' => $details];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderReceiptHeader  $orderReceiptHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderReceiptHeader $orderReceiptHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderReceiptHeader  $orderReceiptHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orderReceiptHeader)
    {
       $mir_detials = $request->details;
        $mir =  OrderReceiptHeader::find($orderReceiptHeader);
        $mir->vendor_dc_no                      = $request->has('vendor_dc_no') ? $request->vendor_dc_no: '';
        $mir->vendor_dc_date                        = $request->has('vendor_dc_date') ? $request->vendor_dc_date: '';
        $mir->vendor_invoice_no                     = $request->has('vendor_invoice_no') ? $request->vendor_invoice_no: '';
        $mir->vendor_invoice_date                       = $request->has('vendor_invoice_date') ? $request->vendor_invoice_date: '';
        $mir->gate_entry_no                     = $request->has('gate_entry_no') ? $request->gate_entry_no: '';
        $mir->gate_entry_date                       = $request->has('gate_entry_date') ? $request->gate_entry_date: '';
        // $mir->p_and_f                       = $request->has('p_and_f') ? $request->p_and_f: '';
        $mir->p_and_f                       = $request->has('other_charges') ? $request->other_charges: '';
        $mir->courrier                      = $request->has('courrier') ? $request->courrier: '';
        $mir->total_bill_amount                     = $request->has('total_bill_amount') ? $request->total_bill_amount: '';
        $mir->save();
        $mir_id = $mir->id;
        // $mird = new OrderReceiptDetails;
        
        $to_be_resets = OrderReceiptDetails::where('order_receipt_header_id',$orderReceiptHeader)->get();
        
        foreach($to_be_resets as $to_be_reset){
            $ordd = OrderDetails::where('id',$to_be_reset->order_detail_id)->first();
            $ordd->recieved_quantity = $ordd->recieved_quantity - $to_be_reset->recieved_quantity ;
            $ordd->save();
        }
        OrderReceiptDetails::where('order_receipt_header_id',$orderReceiptHeader)->delete();

        foreach($mir_detials as $mir_detail){
            
            $mird = new OrderReceiptDetails;
            $mird->order_receipt_header_id  = $mir_id;
            $mird->order_id                 = isset($mir_detail['order_id']) ? $mir_detail['order_id'] : '';
            $mird->item_id                  = isset($mir_detail['item_id']) ? $mir_detail['item_id'] : '';
            $mird->order_detail_id          = isset($mir_detail['order_detail_id']) ? $mir_detail['order_detail_id'] : '';
            $mird->recieved_quantity        = isset($mir_detail['recieved_qty']) ? $mir_detail['recieved_qty'] : '';
            $mird->conversion_factor        = isset($mir_detail['conversion_factor']) ? $mir_detail['conversion_factor'] : '';
            $mird->rate                     = isset($mir_detail['sub_total']) ? $mir_detail['sub_total'] : '';
            $mird->tax_name                 = isset($mir_detail['tax_name']) ? $mir_detail['tax_name'] : '';
            $mird->tax_value                = isset($mir_detail['tax_percent']) ? $mir_detail['tax_percent'] : '';
            // $mird->tcs = isset($mir_detail['order_id']) ? $mir_detail['order_id'] : '';
            $mird->uom                      = isset($mir_detail['uom']) ? $mir_detail['uom'] : '';
            $mird->created_by               = Auth::id();
            $mird->save();
            if(isset($mir_detail['order_detail_id'])){
                $ordd = OrderDetails::where('id',$mir_detail['order_detail_id'])->first();
                $ordd->recieved_quantity = $ordd->recieved_quantity + $mird->recieved_quantity ;
                $ordd->save();
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderReceiptHeader  $orderReceiptHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderReceiptHeader $orderReceiptHeader)
    {
        //
    }
}
