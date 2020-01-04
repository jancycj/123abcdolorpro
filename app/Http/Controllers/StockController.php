<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Item;
use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $company =  CompanyUser::where('user_id', Auth::id())->first();
        $items = Item::all();
        $stocks= Stock::where('company_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        if($request->has('json')){
            return $items;
        }
        return view('v1.colorpro.company.items',compact('items','user','stocks'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $user = User::where('id',Auth::id())->with('company')->first();
        return view('v1.company_dashbord.create_items',compact('items','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'item'     => 'required',
            'quantity'    => 'required|numeric',
            'location'            => 'required',
            'unit'           => 'required',
        ]);
        $stock = new Stock;
        $stock->company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $stock->item_id = $request->item;
        $stock->unit_id = $request->unit;
        $stock->quantity = $request->quantity;
        $stock->location = $request->location;
        $stock->created_by = Auth::id();
        $stock->save();
        $stock->ref_no = 'STCK-'.$stock->id;
        $stock->save();
        return redirect('/company/stocks')->with(['message' => 'successfully added']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return $stock;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
