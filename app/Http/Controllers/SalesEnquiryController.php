<?php

namespace App\Http\Controllers;

use App\SalesEnquiry;
use App\SalesEnquiryDetails;
use App\Helpers\DocNo;
use App\CompanyUser;
use App\LookupMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enquiry = LookupMaster::where('lookup_key','MODE OF ENQUIRY')->get();


         if($request->has('id')){
          return SalesEnquiry::where('id',$request->id)->with('items')->first();
        }


         return view('v1.colorpro.company.salesenquiry',compact('enquiry'));
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
      $sal_enq                             = new SalesEnquiry();
      $sal_enq->enquiry_no             = DocNo::getDocNumberString('sales_enq',1);
      $sal_enq->company                = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
      $sal_enq->enquiry_date           = now();
      $sal_enq->customer_id            = $request->customer_id;
      $sal_enq->enquiry_type           = $request->enquiry_type;
      $sal_enq->mod_of_enquiry         = $request->mod_of_enquiry;
      $sal_enq->registerd_by           = $request->registerd_by;
      $sal_enq->contact_person         = $request->contact_person;
      $sal_enq->designation            = $request->designation;
      $sal_enq->contact_no             = $request->contact_no;
      $sal_enq->status                 = 'registerd';
       $sal_enq->save();
       $header_id                          = $sal_enq->id;
       $items                              = $request->items;
        foreach($items as $item){ 
       $salDetails                         = new SalesEnquiryDetails();
       $salDetails->header_id              = $header_id;
       $salDetails->item_id                = $item['item_id'];
       $salDetails->part_no                = $item['part_no'];
       $salDetails->part_name              = $item['part_name'];;
       $salDetails->qty                    = $item['qty'];
       $salDetails->uom                    = $item['uom'];
       $salDetails->rate                   = $item['rate'];
       $salDetails->status                 = 'Active';
       $salDetails->save();
        }

         $doc                        = DocNo::updateDoc('sales_enq',1);
        return SalesEnquiry::where('id',$header_id)->with('items')->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesEnquiry  $salesEnquiry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesEnquiry  $salesEnquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesEnquiry $salesEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesEnquiry  $salesEnquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesEnquiry $sal_enq)
    {
      $sal_enq = SalesEnquiry::where('id',$request->id)->first();
  
      $sal_enq->customer_id            = $request->customer_id;
      $sal_enq->enquiry_type           = $request->enquiry_type;
      $sal_enq->mod_of_enquiry         = $request->mod_of_enquiry;
      $sal_enq->registerd_by           = $request->registerd_by;
      $sal_enq->contact_person         = $request->contact_person;
      $sal_enq->designation            = $request->designation;
      $sal_enq->contact_no             = $request->contact_no;
        $sal_enq->save();
       $header_id                          = $request->id;
       SalesEnquiryDetails::where('header_id',$header_id)->delete();
       $items                              = $request->items;
        foreach($items as $item){ 
       $salDetails                         = new SalesEnquiryDetails();
       $salDetails->header_id              = $header_id;
       $salDetails->item_id                = $item['item_id'];
       $salDetails->part_no                = $item['part_no'];
       $salDetails->part_name              = $item['part_name'];;
       $salDetails->qty                    = $item['qty'];
       $salDetails->uom                    = $item['uom'];
       $salDetails->rate                   = $item['rate'];
       $salDetails->status                 = 'Active';
       $salDetails->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesEnquiry  $salesEnquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesEnquiry $salesEnquiry)
    {
        //
    }
}
