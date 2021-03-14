<?php

namespace App\Http\Controllers;

use App\OrderReceiptHeader;
use Illuminate\Http\Request;
use DB;

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
            ->leftJoin('rates as rt', function($join)
                {
                $join->on('ordd.item_id', '=', 'rt.item_id');
                $join->on('ord.supplier_id', '=', 'rt.customer_id');

                })
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('ord.order_number', '=',$order_no)  
            ->where('co.name', '=',$party)
            ->whereRaw('IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) > 0')
            ->select(
                'ordd.id',
                'ord.order_number as order_no',
                'ord.order_date',
                'ordd.item_id',
                'ite.part_no',
                'ite.over_reciept_percentage',  
                'ite.name as item',
                'ordd.quantity',
                'ordd.recieved_quantity',
                'ordd.purchase_unit_id as pur_unit',
                'ordd.discount',
                'rt.specifications',
                'ordd.primary_unit_id',
                'ordd.purchase_unit_id',
                'ordd.conversion_factor',
                'lkv.lookup_value as unit'
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderReceiptHeader  $orderReceiptHeader
     * @return \Illuminate\Http\Response
     */
    public function show(OrderReceiptHeader $orderReceiptHeader)
    {
        //
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
    public function update(Request $request, OrderReceiptHeader $orderReceiptHeader)
    {
        //
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
