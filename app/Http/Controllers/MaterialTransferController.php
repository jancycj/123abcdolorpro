<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Costomers;
use App\Item;
use App\MaterialTransfer;
use App\Stock;
use App\User;
use Auth;
use Illuminate\Http\Request;

class MaterialTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $sent = MaterialTransfer::where('ship_from',$company_id)->get();
        $received = MaterialTransfer::where('ship_to',$company_id)->get();
        $items= Stock::where('company_id',$company_id)->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        $customers =  Costomers::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
        return view('v1.colorpro.company.material_transfer',compact('items','user','sent','received','customers'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_id =  CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $items =  Stock::all();
        $companies = Company::where('id','!=',$company_id)->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        return view('v1.company_dashbord.create_transaction',compact('items','companies','user'));
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
            'customer'            => 'required',
            'unit'           => 'required',
        ]);
        // return $request->item;
        $item = Stock::where('id',$request->item)->first();
        
        if($item->quantity < $request->quantity){
            return redirect('/company/transaction/create')->with('err', 'You dont have enough quantity to make this transaction');
        }
        $material = new MaterialTransfer;
        $material->ship_from = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $material->item_id = $request->item;
        $material->unit_id = $request->unit;
        $material->quantity = $request->quantity;
        $material->ship_to = $request->customer;
        $material->created_by = Auth::id();
        $material->purpose = $request->purpose;
        $material->status = 'sent';
        $material->save();
        $material->ref_no = 'OSP-'.$material->id;
        $material->save();
        $item->quantity = $item->quantity - $request->quantity;
        $item->save();
        return 'saved successfully!';
        // return redirect('/company/transaction/create')->with('message','Transaction added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaterialTransfer  $materialTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialTransfer $materialTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaterialTransfer  $materialTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(MaterialTransfer $materialTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaterialTransfer  $materialTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaterialTransfer $materialTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaterialTransfer  $materialTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaterialTransfer $materialTransfer)
    {
        //
    }
}
