<?php

namespace App\Http\Controllers;

use App\Helpers\DocNo;
use App\WorkOrder;
use App\WorkOrderDetails;
use App\LookupMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $wo_type = LookupMaster::where('lookup_key','WO TYPE')->get();

        return view('v1.colorpro.company.workorder',compact('wo_type'));
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
       $wo_itm                     =  new WorkOrder();
       $wo_itm->wo_no              =  DocNo::getDocNumberString('wo',1);
       $wo_itm->company_id         = auth()->user()->id;
       $wo_itm->wo_date            = now();
    
       $wo_itm->wo_type            = $request->wo_type;
       $wo_itm->wo_description     = $request->wo_description;
       $wo_itm->remarks            = $request->remarks;
       $wo_itm->save();
       $header_id = $wo_itm->id;
       $items = $request->items;
       $wono = $wo_itm->wo_no;
       foreach($items as $item){ 
       $woDetails = new WorkOrderDetails();
      $woDetails->header_id            = $header_id;

           $woDetails->wo_no         = $wono;
           $woDetails->wo_date       = now();
           $woDetails->company_id    = auth()->user()->id;
           $woDetails->need_by_date  = $item['need_by_date'];
           $woDetails->part_no       = $item['part_no'];
           $woDetails->job_no        = $item['job_no'];
           $woDetails->qty           = $item['qty'];
           $woDetails->save();
         }
         

       $doc                        = DocNo::updateDoc('wo',1);
       return WorkOrder::where('id',$header_id)->with('items')->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
       return WorkOrder::where('id',$id)->with('items')->first();
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  WorkOrder $wo_itm)
    {
    
      $wo_itm = WorkOrder::where('id',$request->id)->first();
        $wo_itm->company_id         = auth()->user()->id;
        $wo_itm->wo_date            = now();
        $wo_itm->wo_no              = $request->wo_no;
        $wo_itm->wo_type            = $request->wo_type;
        $wo_itm->wo_description     = $request->wo_description;
        $wo_itm->remarks            = $request->remarks;
       $wo_itm->save();
        $header_id = $request->id;
        $items = $request->items;
        $wono = $request->wo_no;
        WorkOrderDetails::where('header_id',$header_id)->delete();
        foreach($items as $item){ 
        $woDetails = new WorkOrderDetails();
            $woDetails->header_id            = $header_id;
            $woDetails->wo_no         = $wono;
            $woDetails->wo_date       = now();
            $woDetails->company_id    = auth()->user()->id;
            $woDetails->need_by_date  = $item['need_by_date'];
            $woDetails->part_no       = $item['part_no'];
            $woDetails->job_no        = $item['job_no'];
            $woDetails->qty           = $item['qty'];
            $woDetails->save();
          }
          
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkOrder  $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }

   
}
