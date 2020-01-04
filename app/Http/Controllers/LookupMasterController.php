<?php

namespace App\Http\Controllers;

use App\LookupMaster;
use Illuminate\Http\Request;

class LookupMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lookup = LookupMaster::where('lookup_key','Master')->get();
       return view('v1.colorpro.admin.lookup_masters',compact('lookup'));
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
        $this->validate($request, [
            'name'     => 'required',
        ]);
        $item = new LookupMaster;
        $item->lookup_key = 'Master';
        $item->lookup_value = strtoupper($request->name);
        $item->lookup_description = $request->desc;
        $item->end_date = $request->date;
        $item->save();
        return 'saved!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LookupMaster  $lookupMaster
     * @return \Illuminate\Http\Response
     */
    public function show(LookupMaster $lookupMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LookupMaster  $lookupMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(LookupMaster $lookupMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LookupMaster  $lookupMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LookupMaster $lookupMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LookupMaster  $lookupMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(LookupMaster $lookupMaster)
    {
        //
    }
    public function company_get_lookup(Request $request)
    {
        if($request->has('json')){
            if($request->has('key')){
                return LookupMaster::where('lookup_key',$request->key)->get();
            }
        }
        $lookup_master = LookupMaster::where('lookup_key','Master')->get();
        $lookup_value = LookupMaster::where('lookup_key','Gender')->get();
        return view('v1.colorpro.company.lookup_master',compact('lookup_master','lookup_value'));
    }

    public function company_post_lookup(Request $request)
    {
        $this->validate($request, [
            'lookup_value'     => 'required|unique:lookup_masters',
            'key'     => 'required',
            // 'value'     => 'required',
        ]);
        $item = new LookupMaster;
        $item->lookup_key = strtoupper($request->key);
        $item->lookup_value = $request->lookup_value;
        $item->genaral_value = $request->value;
        $item->lookup_description = $request->desc;
        $item->end_date = $request->date;
        $item->save();
        return 'saved!';
    }
}
