<?php

namespace App\Http\Controllers;

use App\Shade;
use Illuminate\Http\Request;

class ShadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = [];
        $categories = [];
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shade  $shade
     * @return \Illuminate\Http\Response
     */
    public function show(Shade $shade)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shade  $shade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shade $shade)
    {
        //
    }
}
