<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Item;
use App\Process;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $items =  Item::where('company_id',$company_id)->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        $process = Process::where('company_id',$company_id)->get();
        return view('v1.colorpro.company.process',compact('process','user','items'));//


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items =  Item::all();

        return view('v1.company.create_process',compact('items'));//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $process = new Process;
        $process->item_id = $request->item;
        $process->company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $process->process_code=$request->process_code;
        $process->process_description =$request->process_description;
        $process->process_mode =$request->process_mode;
        $process->section =$request->section;
        $process->oprn_ts =$request->oprn_ts;
        $process->oprn_to =$request->oprn_to;
        $process->responsible_person =$request->responsible_person;
        $process->scrap_code =$request->scrap_code;
        $process->scrap_persentage =$request->scrap_persentage;
        $process->process_item_id =$request->process_item_id;
        $process->mechine_no =$request->mechine_no;
        $process->save();
        $process->operation_no ='PRCSS'.$process->id;
        $process->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        //
    }
}
