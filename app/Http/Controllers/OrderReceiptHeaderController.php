<?php

namespace App\Http\Controllers;

use App\Bincard;
use App\CompanyUser;
use App\Helpers\DocNo;
use App\InspectionDetails;
use App\Item;
use App\OrderDetails;
use App\OrderReceiptDetails;
use App\OrderReceiptHeader;
use App\Stock;
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
                'orcd.id as order_receipt_id',
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
            $mird->status                   = 'completed';
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

    public function getInspectionData($orderReceiptHeader)
    {
        $header = OrderReceiptHeader::find($orderReceiptHeader);
        $details = DB::table('order_receipt_details as orcd')
            ->join('orders as ord', 'orcd.order_id', '=', 'ord.id')
            ->join('order_details as ordd', 'orcd.order_detail_id', '=', 'ordd.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('orcd.order_receipt_header_id', '=',$orderReceiptHeader)
            ->whereRaw('IFNULL(orcd.recieved_quantity,0) - (IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0) + IFNULL(orcd.rework_quantity,0) + IFNULL(orcd.rejected_quantity,0)) > 0')
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
                'orcd.id as order_receipt_id',
                DB::raw(" IFNULL(orcd.recieved_quantity,0) - (IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0) + IFNULL(orcd.rework_quantity,0) + IFNULL(orcd.rejected_quantity,0)) as mir_quantity"),
                )->get();
        // $details = OrderReceiptDetails::where('order_receipt_header_id',$orderReceiptHeader)->get();

        return ['header' => $header, 'details' => $details];
    }
   
    public function purchase_inspection(Request $request)
    {

        $mir_detials = $request->details;
        
        foreach($mir_detials as $mir_detail){
            
            $mird = OrderReceiptDetails::find($mir_detail['order_receipt_id']);
            $mird->accepted_quantity                        = $mird->accepted_quantity + 
            floatval(isset($mir_detail['accepted_qty']) ? $mir_detail['accepted_qty'] : 0);
            $mird->conditionally_accepted_quantity          = $mird->conditionally_accepted_quantity+ 
            floatval(isset($mir_detail['cond_accepted_qty']) ? $mir_detail['cond_accepted_qty'] : 0);
            $mird->rework_quantity                          = $mird->rework_quantity+ 
            floatval(isset($mir_detail['rework_qty']) ? $mir_detail['rework_qty'] : 0);
            $mird->rejected_quantity                        =  $mird->rejected_quantity + 
            floatval(isset($mir_detail['rejected_qty']) ? $mir_detail['rejected_qty'] : 0);
            $mird->rework_reason                            = isset($mir_detail['rework_reason']) ? $mir_detail['rework_reason'] : '';
            $mird->rejected_reason                            = isset($mir_detail['rejected_reason']) ? $mir_detail['rejected_reason'] : '';
            $mird->save();

            $inspection = new InspectionDetails;
            $inspection->order_receipt_details_id                   = $mird->id;
            $inspection->conditionally_accepted_quantity            = isset($mir_detail['cond_accepted_qty']) ? $mir_detail['cond_accepted_qty'] : 0;
            $inspection->accepted_quantity                          = isset($mir_detail['accepted_qty']) ? $mir_detail['accepted_qty'] : 0;
            $inspection->reworked_quantity                          = isset($mir_detail['rework_qty']) ? $mir_detail['rework_qty'] : 0;
            $inspection->rejected_quantity                          = isset($mir_detail['rejected_qty']) ? $mir_detail['rejected_qty'] : 0;
            $inspection->type                                       = 'p';
            $inspection->inspection_date                            = Carbon::now();;
            $inspection->inspected_by                               = Auth::id();
            $inspection->rework_reason                              = isset($mir_detail['rework_reason']) ? $mir_detail['rework_reason'] : '';
            $inspection->rejected_reason                            = isset($mir_detail['rejected_reason']) ? $mir_detail['rejected_reason'] : '';
            $inspection->save();
            
        }
        return 'true';

    }

    public function getStockUpdateData($orderReceiptHeader)
    {
        $header = OrderReceiptHeader::find($orderReceiptHeader);
        $details = DB::table('order_receipt_details as orcd')
            ->join('orders as ord', 'orcd.order_id', '=', 'ord.id')
            ->join('order_details as ordd', 'orcd.order_detail_id', '=', 'ordd.id')
            ->join('items as ite', 'ordd.item_id', '=', 'ite.id')
            ->join('costomers as co', 'ord.supplier_id', '=', 'co.id')
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->leftJoin('stocks as stk', 'ordd.item_id', '=', 'stk.item_id')
            ->where('orcd.order_receipt_header_id', '=',$orderReceiptHeader)
            ->whereRaw('IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0)
            > IFNULL(orcd.store_accepted_quantity,0)')
            ->select(
                'ordd.*',
                'ordd.id as order_detail_id',
                'ord.order_number as order_no',
                'ord.order_date',
                'ord.currency',
                'ord.exchange_rate',
                'ord.tax_percent',
                'ord.tax_name',
                'ord.pnf_total',
                'ord.courrier_charge',
                'ite.part_no',
                'ite.over_reciept_percentage',  
                'ite.name as item',
                'lkv.lookup_value as uom',
                'orcd.accepted_quantity as mir_accepted_quantity',
                'orcd.conditionally_accepted_quantity as mir_conditionally_accepted_quantity',
                'orcd.recieved_quantity as recieved_qty',
                'orcd.id as order_receipt_id',
                'stk.warehouse_id',
                DB::raw(" IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0) - IFNULL(orcd.store_accepted_quantity,0) as total_accepted_qty"),
                DB::raw(" IFNULL(orcd.accepted_quantity,0) + IFNULL(orcd.conditionally_accepted_quantity,0) - IFNULL(orcd.store_accepted_quantity,0) as stock_take_qty")
                )->get();
        // $details = OrderReceiptDetails::where('order_receipt_header_id',$orderReceiptHeader)->get();

        return ['header' => $header, 'details' => $details];
    }

    public function post_purchase_stock(Request $request)
    {

        //item list price
        $mir_detials = $request->details;
        $mir_header = $request->all();
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        foreach($mir_detials as $mir_detail){
            
            $mird = OrderReceiptDetails::find($mir_detail['order_receipt_id']);
            $mird->store_accepted_quantity                        = $mird->store_accepted_quantity + 
            floatval(isset($mir_detail['stock_take_qty']) ? $mir_detail['stock_take_qty'] : 0);
            $last_bin =  Bincard::where('item_id', $mird->item_id)->latest()->first();
            $mird->save();
            
            $exchage_rate       = isset($mir_detail['exchange_rate']) ? $mir_detail['exchange_rate'] : 1;
            $bincard            = new Bincard;
            $bincard->company_id                    = $company_id ;
            $bincard->transaction_date              = Carbon::now();
            $bincard->transanction_type             = 'R';
            $bincard->transaction_code              = 40;
            $bincard->item_id                       = $mird->item_id;
            // $bincard->item_slno                 = ;
            $bincard->reference_no                  = $mir_header['mir_no'];
            $bincard->reference_date                    = $mir_header['mir_date'];
            $bincard->opening_stock                 = isset($last_bin->closing_stock) ? $last_bin->closing_stock : 0 ;
            $bincard->opening_value                 = isset($last_bin->closing_value) ? $last_bin->closing_value:0 ;
            $bincard->transaction_qty               = $mird->store_accepted_quantity / $mird->conversion_factor;
            $bincard->trasaction_value              = $mird->store_accepted_quantity * $mird->rate * $exchage_rate;

            $bincard->closing_stock                 = $bincard->opening_stock + $bincard->transaction_qty ;
            $bincard->closing_value                 = $bincard->opening_value  + $bincard->trasaction_value;
            $bincard->transaction_by                = Auth::id();
            // $bincard->computer_name                 = $mir_header->mir_date ;
            $bincard->store_code                    = isset($mir_header['warehouse_id']) ? $mir_header['warehouse_id'] : '01';
            // $bincard->batch_no                      = $mir_header->mir_date ;
            // $bincard->batch_date                    = $mir_header->mir_date ;
            // $bincard->expiry_date                   = $mir_header->mir_date ;
            // $bincard->remarks                       = $mir_header->mir_date ;
            $bincard->save();

            $stock = Stock::where('item_id',$bincard->item_id)->first();
            $stock->quantity = $stock->quantity + $bincard->transaction_qty ;
            $stock->save();

            $item = Item::find($bincard->item_id);
            $item->weight_average_rate = $bincard->closing_value / $bincard->closing_stock ;
            $item->save();

        }
        return 'true';

    }

}
