<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Helpers\DocNo;
use App\Mail\OrderRecieved;
use App\Order;
use App\OrderDetails;
use App\OrderQCDetails;
use App\OrderReceiptDetails;
use App\OrderReceiptHeader;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderReceiptDetailsController extends Controller
{
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
        
        $order = $request->all();
        $order_details =  $order['details'];
        
        $dc_no = $order['dc_no'];
        $dc_date = $order['dc_date'];
        $order_ob = Order::find($request->id);
        $order_ob->status = 'processing';
        $order_ob->save();
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $mir = new OrderReceiptHeader;
        $mir->company_id                = $request->has('comapny_id') ? $request->comapny_id: 1;
        $mir->mir_no                    = DocNo::getDocNumberString('mirp',1);
        $mir->mir_date                  = Carbon::now()->format('Y-m-d');
        $mir->vendor_id                 = $request->has('supplier_id') ? $request->supplier_id: '';
        $mir->vendor_dc_no                      = $request->has('dc_no') ? $request->dc_no: '';
        $mir->vendor_dc_date                        = $request->has('dc_date') ? $request->dc_date: '';
        $mir->vendor_invoice_no                     = $request->has('vendor_invoice_no') ? $request->vendor_invoice_no: '';
        $mir->vendor_invoice_date                       = $request->has('vendor_invoice_date') ? $request->vendor_invoice_date: '';
        $mir->gate_entry_no                     = $request->has('gate_entry_no') ? $request->gate_entry_no: '';
        $mir->gate_entry_date                       = $request->has('gate_entry_date') ? $request->gate_entry_date: '';
        // $mir->p_and_f                       = $request->has('p_and_f') ? $request->p_and_f: '';
        $mir->p_and_f                       = $request->has('pnf_total') ? $request->pnf_total: '';
        $mir->courrier                      = $request->has('courrier_charge') ? $request->courrier_charge: '';
        $mir->total_bill_amount                     = $request->has('total_bill_amount') ? $request->total_bill_amount: '';
        $mir->created_by                        = Auth::id();
        $mir->save();
        $mir_id = $mir->id;
        $doc = DocNo::updateDoc('mirp',1);

        foreach($order_details as $ord){
            $order_details = OrderDetails::find($ord['id']);
            $order_details->recieved_quantity = $order_details->recieved_quantity + $ord['recieved'];
            $order_details->save();
            $ord_entry = new OrderReceiptDetails;
            $ord_entry->order_detail_id = $ord['id'];
            $ord_entry->order_receipt_header_id = $mir_id;
            $ord_entry->recieved_quantity = $ord['recieved'];
            $ord_entry->order_id = $ord['order_id'];
            $ord_entry->item_id = $ord['item_id'];
            $ord_entry->tax_name = $ord['tax_name'];
            $ord_entry->tax_value = $ord['tax_percent'];
            $ord_entry->status = 'pending';
            // $ord_entry->dc_no = $dc_no;
            // $ord_entry->dc_date = $dc_date;
            $ord_entry->created_by = Auth::id();
            $ord_entry ->save();
            $order_qc =  isset($ord['qc_details'])?$ord['qc_details']:[];
            foreach($order_qc as $qc){
                $qc_details = new OrderQCDetails;
                $qc_details->qc_plan_id = $qc['id'];
                $qc_details->order_details_id = $order_details->id;
                $qc_details->result = isset($qc['inspection'])?$qc['inspection']:'';
                $qc_details->remark = isset($qc['remark'])?$qc['remark']:'';
                $qc_details->qc_date = Carbon::now();
                $qc_details->created_by= Auth::id();
                $qc_details->save();
    
            }
        }
        return $mir;

        if($ship = Company::find($order['shipto_customer_id'])){
            Mail::to($ship->email)->send(new OrderRecieved($order));
        };
        
        
        return 'Saved successfully!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderReceiptDetails  $orderReceiptDetails
     * @return \Illuminate\Http\Response
     */
    public function show(OrderReceiptDetails $orderReceiptDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderReceiptDetails  $orderReceiptDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderReceiptDetails $orderReceiptDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderReceiptDetails  $orderReceiptDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderReceiptDetails $orderReceiptDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderReceiptDetails  $orderReceiptDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderReceiptDetails $orderReceiptDetails)
    {
        //
    }
}
