<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\QCPlan;
use App\Stock;
use Auth;
use Illuminate\Http\Request;

class QCPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('json')){

            
            
            return QCPlan::where('comapny_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->get();
        }
        $items= Stock::where('company_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->get();
        return view('v1.colorpro.company.qc_plans',compact('customers','items','units'));
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
            'item'                  => 'required',
            'plan'                  => 'required',
            'value'                 => 'required',
            'tollarence'            => 'required',
        ]);
        $qc = new QCPlan;
        $qc->comapny_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $qc->item_id        = $request->item;
        $qc->qc_parameter   = $request->plan;
        $qc->qc_value       = $request->value;
        $qc->qc_tollarence  = $request->tollarence;
        $qc->created_by     = Auth::id();
        $qc->save();
        $qc->qc_serial_no   = count(QCPlan::where('item_id',$request->item)->get())+1;
        $qc->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QCPlan  $qCPlan
     * @return \Illuminate\Http\Response
     */
    public function show(QCPlan $qCPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QCPlan  $qCPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(QCPlan $qCPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QCPlan  $qCPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QCPlan $qCPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QCPlan  $qCPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(QCPlan $qCPlan)
    {
        //
    }
}
