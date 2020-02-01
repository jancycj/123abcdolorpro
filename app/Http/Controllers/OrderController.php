<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Order;
use App\OrderDetails;
use App\OrderSchedules;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $orders = Order::where('comapny_id',$company_id)->get();
        return view('v1.colorpro.company.orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        return view('v1.colorpro.company.create_order',compact('company_id'));
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
        $this->validate($request, [
            'order'     => 'required',
            'order_details'    => 'required',
        ]);

        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $order_ob = $request->order;
        // return $order_ob['quotation_no'];
        $order_details_ob = $request->order_details;
        $order = new order;
        $order->comapny_id          = $company_id;
        $order->order_number        = $order_ob['quotation_no'];
        $order->order_date          = Carbon::now();
        $order->order_type          = $order_ob['order_type'];
        $order->shipto_customer_id  = $order_ob['ship_to'];
        $order->suppier_id          = $order_ob['supplier'];
        $order->billto_customer_id  = $company_id;
        $order->quote_ref_no        = $order_ob['quotation_no'];
        // $order->quote_ref_date      = $order_ob
        $order->created_by          = Auth::id();
        // $order->approved_by         = $order_ob
        // $order->approved_date       = $order_ob
        // $order->currency            = $order_ob
        $order->status              = 'pending';
        $order->basic_total         = $order_ob['basic_total'];
        $order->sub_total           = $order_ob['sub_total'];
        $order->pnf_total           = $order_ob['pf_amount'];
        $order->courrier_charge     = $order_ob['courrier_amount'];
        
        $order->tax_id              = isset($order_ob['tax_ob'])? $order_ob['tax_ob']['id']:''; 
        $order->tax_percent         = $order_ob['tax_value']; 
        $order->tax_amount          = $order_ob['tax_amount'];
        $order->grant_total         = $order_ob['grant_total'];
        $order->save();

        $order_id = $order->id;

        foreach($order_details_ob as $od){

            $order_details = new OrderDetails;
            $order_details->order_id = $order_id;
            $order_details->item_id = $od['item_id'];
            $order_details->rate  = $od['rate'];
            $order_details->quantity = $od['quantity'];
            $order_details->primary_unit_id = $od['primary_unit'];
            $order_details->purchase_unit_id = $od['purchase_unit'];
            $order_details->conversion_factor = $od['conversion_factor'];
            $order_details->delivery_date = $od['date'];
            $order_details->status              = 'pending';
            $order_details->save();

            $order_details_id = $order_details->id;
            if(isset($od['schedule'])){

                foreach($od['schedule'] as $sched){
                    $ord_sched = new OrderSchedules;
                    $ord_sched->order_details_id = $order_details_id;
                    $ord_sched->quantity = $sched['quantity'];
                    $ord_sched->date = $sched['date'];
                    $ord_sched->save();
                    
                }
            }
            

        }

        return 'order created successfully!';
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
