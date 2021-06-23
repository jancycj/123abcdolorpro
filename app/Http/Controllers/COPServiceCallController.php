<?php

namespace App\Http\Controllers;

use App\Helpers\DocNo;
use App\COPServiceCall;
use App\LookupMaster;
use Illuminate\Http\Request;

class COPServiceCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enquiry = LookupMaster::where('lookup_key','MODE OF ENQUIRY')->get();
         $replacemt = LookupMaster::where('lookup_key','REPLACEMENT REASON')->get();
         $service_type = LookupMaster::where('lookup_key','SERVICE TYPE')->get();
         $mode_payment = LookupMaster::where('lookup_key','MODE OF PAYMENT')->get();
         $mode_service = LookupMaster::where('lookup_key','MODE OF SERVICE')->get();

         if($request->has('service_no')){
            return COPServiceCall::where('service_no',$request->service_no)->first();
        }
       
          return view('v1.colorpro.company.copservicecall', compact('enquiry','replacemt','service_type','mode_payment','mode_service'));//
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $copservicecall = new COPServiceCall;
        $copservicecall->service_no          = DocNo::getDocNumberString('copsercall',1);
      
        $copservicecall->company             = auth()->user()->id;
        $copservicecall->service_date        = now();
        $copservicecall->customer_id         = $request->customer_id;
        $copservicecall->customer_name       = $request->customer_name;
        $copservicecall->enq_mode            = $request->enq_mode;
        $copservicecall->commissioned_date   = $request->commissioned_date;
        $copservicecall->warrenty_date       = $request->warrenty_date;
        $copservicecall->service_type        = $request->service_type;
        $copservicecall->contact_person      = $request->contact_person;
        $copservicecall->contact_no          = $request->contact_no;
        $copservicecall->machine_slno        = $request->machine_slno;
        $copservicecall->assigned_engineer   = $request->assigned_engineer;
        $copservicecall->assigned_date       = $request->assigned_date;
        $copservicecall->attend_date         = $request->attend_date;
        $copservicecall->replacement_reason  = $request->replacement_reason;
        $copservicecall->gst_invoice_no      = $request->gst_invoice_no; 
        $copservicecall->complaints          = $request->complaints;          
        $copservicecall->mode_of_service     = $request->mode_of_service;
        $copservicecall->service_report_no   = $request->service_report_no;
        $copservicecall->invoice_total_amount= $request->invoice_total_amount;
        $copservicecall->closed_date         = $request->closed_date;
        if ($request->status==true)
          $copservicecall->status              = 'Closed';
        $copservicecall->mode_of_payment     = $request->mode_of_payment;
        $copservicecall->save();

        $doc = DocNo::updateDoc('copsercall',1);
       return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, COPServiceCall $copservicecall )
    {
       
       
        $copservicecall->company             = auth()->user()->id;
        $copservicecall->service_date        = now();
        $copservicecall->customer_id         = $request->customer_id;
        $copservicecall->customer_name       = $request->customer_name;
        $copservicecall->enq_mode            = $request->enq_mode;
        $copservicecall->commissioned_date   = $request->commissioned_date;
        $copservicecall->warrenty_date       = $request->warrenty_date;
        $copservicecall->service_type        = $request->service_type;
        $copservicecall->contact_person      = $request->contact_person;
        $copservicecall->contact_no          = $request->contact_no;
        $copservicecall->machine_slno        = $request->machine_slno;
        $copservicecall->assigned_engineer   = $request->assigned_engineer;
        $copservicecall->assigned_date       = $request->assigned_date;
        $copservicecall->attend_date         = $request->attend_date;
        $copservicecall->replacement_reason  = $request->replacement_reason;
        $copservicecall->gst_invoice_no      = $request->gst_invoice_no; 
        $copservicecall->complaints          = $request->complaints;          
        $copservicecall->mode_of_service     = $request->mode_of_service;
        $copservicecall->service_report_no   = $request->service_report_no;
        $copservicecall->invoice_total_amount= $request->invoice_total_amount;
        $copservicecall->closed_date         = $request->closed_date;

        if ($request->status==true)
          $copservicecall->status              = 'Closed';
        $copservicecall->mode_of_payment     = $request->mode_of_payment;
        
        $copservicecall->save();
        return response(['message' => 'successfully saved'],200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
?>