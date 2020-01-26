<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetails;
use App\OrderQCDetails;
use App\OrderReceiptDetails;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

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
        
        $order_ob = Order::find($request->id);
        $order_ob->status = 'processing';
        $order_ob->save();
        foreach($order_details as $ord){
            $order_details = OrderDetails::find($ord['id']);
            $order_details->recieved_quantity = $order_details->recieved_quantity + $ord['recieved'];
            $order_details->save();
            $ord_entry = new OrderReceiptDetails;
            $ord_entry->order_details_id = $ord['id'];
            $ord_entry->recieved_quantity = $ord['recieved'];
            $ord_entry->delivery_date = Carbon::now();
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
