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
            ->leftJoin('lookup_masters as lkv', 'ordd.purchase_unit_id', '=', 'lkv.id')
            ->where('ord.order_number', '=',$order_no)  
            ->where('co.id', '=',$party)
            ->whereRaw('IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) > 0')
            ->select(
                'ordd.*',
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
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as mir_quantity")
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
                DB::raw(" IFNULL(ordd.quantity,0) - IFNULL(ordd.recieved_quantity,0) as mir_quantity")
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
        return $request->all();
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
