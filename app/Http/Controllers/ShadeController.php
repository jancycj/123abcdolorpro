<?php

namespace App\Http\Controllers;

use App\Shade;
use Illuminate\Http\Request;
use Auth;

class ShadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = [];
        $categories = [];
        if($request->has('json')){
            return Shade::all();
        }
        return view('v1.colorpro.company.shade',compact('units','categories'));
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
            'customer_name'         => 'required',
            'customer_code'         => 'required',
            'customer_id'           => 'required|numeric',
            'priory'                => 'required',
            'code'                  => 'required',
            'colour'                => 'required',
            'program_code'          => 'required',
        ]);
        if(Shade::where(['code' => $request->program_code, 'name' => $request->code,'customer_id' => $request->customer_id])->first()){
            return response('shade already exist',400);
        }
        $shade = new Shade;
        $shade->name = $request->code;
        $shade->code = $request->program_code;
        $shade->colour= $request->colour;
        $shade->priority= $request->priory;
        $shade->customer_id= $request->customer_id;
        $shade->created_by= Auth::id();
        $shade->save();
        return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shade  $shade
     * @return \Illuminate\Http\Response
     */
    public function show(Shade $shade)
    {
        return $shade;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shade  $shade
     * @return \Illuminate\Http\Response
     */
    public function edit(Shade $shade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shade  $shade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shade $shade)
    {
        $this->validate($request, [
            'customer_name'         => 'required',
            'customer_code'         => 'required',
            'customer_id'           => 'required|numeric',
            'priory'                => 'required',
            'code'                  => 'required',
            'colour'                => 'required',
            'program_code'          => 'required',
        ]);
        // $shade = new Shade;
        $shade->name = $request->code;
        $shade->code = $request->program_code;
        $shade->colour= $request->colour;
        $shade->priority= $request->priory;
        $shade->customer_id= $request->customer_id;
        $shade->created_by= Auth::id();
        $shade->save();
        return 'true';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shade  $shade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shade $shade)
    {
        $shade->delete();
        return 'true';
    }
}
