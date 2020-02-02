<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Item;
use App\LookupMaster;
use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $units = LookupMaster::where('lookup_key','UNIT')->get();
        $categories = LookupMaster::where('lookup_key','ITEM CATEGORY')->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        $items =  Item::all();
        return view('v1.colorpro.admin.items',compact('items','user','units','categories'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.company.create_items');//
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
            'name'     => 'required',
            'part_no'    => 'required',
            'category'    => 'required',
        ]);
        $company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $item = new Item;
        $item->name = $request->name;
        $item->company_id =$request->has('admin')? 0:$company_id ;
        $item->category_id = $request->category;
        $item->part_no = $request->part_no;
        $item->unit_id = $request->unit;
        $item->catelog_drwaing_no = $request->catelog_drwaing_no;
        $item->hsn_code = $request->hsn_code;
        $item->rol = $request->rol;
        $item->part_type = $request->part_type;
        $item->sourcing_code = $request->sourcing_code;
        $item->created_by = Auth::id();
        $item->updated_by = Auth::id();

        $item->save();

        $stock = new Stock;
        $stock->company_id  = $company_id ;
        $stock->item_id     = $item->id;
        $stock->unit_id     = $item->unit_id;
        $stock->created_by  = Auth::id();
        
        $stock->save();

        // return redirect('/admin/items')->with(['message' => 'successfully added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->name = $request->name;
        $item->catelog_drwaing_no = $request->catelog_drwaing_no;
        $item->hsn_code = $request->hsn_code;
        $item->part_type = $request->part_type;
        $item->sourcing_code = $request->sourcing_code;
        $item->category_id = $request->category_id;
        $item->rol = $request->rol;
        $item->updated_by = Auth::id();
        $item->status = $request->status;
        $item->save();
        return 'True';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
    public function company_item()
    {
        $company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $units = LookupMaster::where('lookup_key','UNIT')->get();
        $categories = LookupMaster::where('lookup_key','ITEM CATEGORY')->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        $items =  Item::where('company_id',$company_id)->get();
        return view('v1.colorpro.company.item_master',compact('items','user','units','categories'));//
    }
}
