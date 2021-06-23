<?php

namespace App\Http\Controllers;

use App\SalesQuotation;
use App\SalesQuotationDetails;
use App\Helpers\DocNo;
use App\CompanyUser;
use App\LookupMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      if($request->has('id')){
          return SalesQuotation::where('id',$request->id)->with('items')->first();
       // var_dump(SalesQuotation::where('id',$request->id)->with('items')->first());
        }
   
         return view('v1.colorpro.company.salesquotation');
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
        
      $sal_quot                             = new SalesQuotation();
      $sal_quot->quote_no                   = DocNo::getDocNumberString('sales_quot',1);
      $sal_quot->company_id                 = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
      $sal_quot->quote_date                 = now();
      $sal_quot->customer_id                = $request->customer_id;
      $sal_quot->enquiry_no                 = $request->enquiry_no;
      $sal_quot->enquiry_date               = $request->enquiry_date;
      $sal_quot->contact_person             = $request->contact_person;
      $sal_quot->contact_no                 = $request->contact_no;
      $sal_quot->prepared_by                = $request->prepared_by;
      $sal_quot->authorized_by              = $request->authorized_by;
 
       $sal_quot->gst_tariff                = $request->gst_tariff;
       $sal_quot->gst_perc                  = $request->gst_perc;
       $sal_quot->gst_value                 = $request->gst_value;
       $sal_quot->tcs_perc                  = $request->tcs_perc;
       $sal_quot->currency                  = $request->currency;
       $sal_quot->exchange_rate             = $request->exchange_rate;
     
       $sal_quot->courier_charge            = $request->courier_amount;
       $sal_quot->gst_amount                = $request->gst_amount;
       $sal_quot->tcs_amount                = $request->tcs_amount;
       $sal_quot->performa_no               = $request->performa_no;
       $sal_quot->performa_date             = $request->performa_date;
       $sal_quot->customer_order_no         = $request->customer_order_no;
       $sal_quot->customer_order_date       = $request->customer_order_date;
       $sal_quot->pf_perc                   = $request->pf_perc;
       $sal_quot->pf_amount                 = $request->pf_amount;
       $sal_quot->basic_total               = $request->basic_total;
       $sal_quot->sub_total                 = $request->sub_total;
       $sal_quot->grant_total               = $request->grant_total;  
       $sal_quot->status                    = 'active';
       $sal_quot->save();
        $header_id                          = $sal_quot->id;
       $items                              = $request->items;
        foreach($items as $item){ 
      $salDetails                        = new SalesQuotationDetails();
       $salDetails->header_id              = $header_id;
       $salDetails->item_id                = $item['item_id'];
       $salDetails->part_no                = $item['part_no'];
       $salDetails->part_name              = $item['name'];;
       $salDetails->qty                    = $item['quantity'];
       $salDetails->uom                    = $item['purchase_unit'];
       $salDetails->rate                   = $item['rate'];
       $salDetails->discount               = $item['discount'];
       $salDetails->net_rate               = $item['net_rate'];
       $salDetails->net_amount             = $item['net_amount'];
       $salDetails->need_by_date           = $item['need_by_date'];
       $salDetails->status                 = 'active';
       $salDetails->save(); 
         }
        $doc                        = DocNo::updateDoc('sales_quot',1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesQuotation  $salesQuotation
     * @return \Illuminate\Http\Response
     */
    public function show(SalesQuotation $salesQuotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesQuotation  $salesQuotation
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesQuotation $salesQuotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesQuotation  $salesQuotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesQuotation $sal_quot)
    {
         var_dump($request->post());

         $sal_quot = SalesQuotation::where('id',$request->id)->first();
        // var_dump($sal_quot);
         $sal_quot->customer_id                = $request->customer_id;
         $sal_quot->enquiry_no                 = $request->enquiry_no;
         $sal_quot->enquiry_date               = $request->enquiry_date;
         $sal_quot->contact_person             = $request->contact_person;
         $sal_quot->contact_no                 = $request->contact_no;
         $sal_quot->prepared_by                = $request->prepared_by;
         $sal_quot->authorized_by              = $request->authorized_by;


         $sal_quot->gst_tariff                = $request->gst_tariff;
         $sal_quot->gst_perc                  = $request->gst_perc;
         $sal_quot->gst_value                 = $request->gst_value;
         $sal_quot->tcs_perc                  = $request->tcs_perc;
         $sal_quot->currency                  = $request->currency;
         $sal_quot->exchange_rate             = $request->exchange_rate;

       $sal_quot->courier_charge            = $request->courier_amount;
       $sal_quot->gst_amount                = $request->gst_amount;
       $sal_quot->tcs_amount                = $request->tcs_amount;
       $sal_quot->performa_no               = $request->performa_no;
       $sal_quot->performa_date             = $request->performa_date;
       $sal_quot->customer_order_no         = $request->customer_order_no;
       $sal_quot->customer_order_date       = $request->customer_order_date;
       $sal_quot->pf_perc                   = $request->pf_perc;
       $sal_quot->pf_amount                 = $request->pf_amount;
       $sal_quot->basic_total               = $request->basic_total;
       $sal_quot->sub_total                 = $request->sub_total;
       $sal_quot->grant_total               = $request->grant_total; 
     

              $sal_quot->status                  = 'active';
              
        $sal_quot->save();

        $header_id                          = $request->id;
       SalesQuotationDetails::where('header_id',$header_id)->delete();
         $items                              = $request->items;

         foreach($items as $item){ 
       $salDetails                         = new SalesQuotationDetails();
      $salDetails->header_id              = $header_id;
      $salDetails->item_id                = $item['item_id'];

      $salDetails->qty                    = $item['quantity'];
      $salDetails->uom                    = $item['purchase_unit'];
      $salDetails->rate                   = $item['rate'];
      $salDetails->discount               = $item['discount'];
      $salDetails->net_rate               = $item['net_rate'];
      $salDetails->net_amount             = $item['net_amount'];     
      $salDetails->need_by_date           = $item['need_by_date'];
      $salDetails->status                 = 'active';
      $salDetails->save(); 
         }
         
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesQuotation  $salesQuotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesQuotation $salesQuotation)
    {
        //
    }
}
