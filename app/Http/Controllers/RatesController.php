<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Costomers;
use App\Item;
use App\LookupMaster;
use App\Rates;
use App\Stock;
use Auth;
use Illuminate\Http\Request;

class RatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('json')){
            
            return Rates::where('company_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->get();
        }
        $units = LookupMaster::where('lookup_key','UNIT')->get();
        $customers =  Costomers::where('company_id',CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first())->get();
        $items= Item::where('company_id',CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first())->get();
        return view('v1.colorpro.company.rate',compact('customers','items','units'));
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

        $rates = $request->all();
       
            foreach($rates as $rate){
                if($rateob = Rates::where('item_id',$rate['item_id'])->where('supplier_id',$rate['supplier_id'])->first()){
                    $rateob->item_id                = $rate['item_id'];
                    $rateob->rate                   = $rate['rate'];
                    $rateob->conversion_factor      = $rate['conversion_factor'];
                    $rateob->discount               = isset($rate['discount'])?$rate['discount']:0;
                    $rateob->specifications         = isset($rate['specifications'])?$rate['specifications']:'';
                    $rateob->supplier_id          = $rate['supplier_id'];
                    $rateob->purchase_unit_id     = $rate['purchase_unit_id'];
                    $rateob->tax_name             = $rate['tax_name'];
                    $rateob->tax_code             = $rate['tax_code'];
                    $rateob->tax_value            = $rate['tax_value'];
                    $rateob->item_weight          = $rate['item_weight'];
                    $rateob->currency             = $rate['currency'];
                    $rateob->exchange_rate        = $rate['exchange_rate'];
                    $rateob->is_default             = isset($rate['is_default'])?$rate['is_default']:'';
                    $rateob->remarks             = $rate['remarks'];
                    $rateob->quatation_no           = isset($rate['quatation_no'])?$rate['quatation_no']:'';
                    $rateob->quatation_date         = isset($rate['quatation_date'])?$rate['quatation_date']:'';
                    $rateob->save();

                    if(isset($rate['is_default']) && $rate['is_default'] == true){
                        $item = Item::find($rate['item_id']);
                        $item->list_price = $rate['rate'] * $rate['conversion_factor'] * $rate['item_weight'] * $rate['exchange_rate'] ;
                        $item->save();
                    }
                } else{
                    $rateob = new Rates;
                    $rateob->company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
                    $rateob->created_by           = Auth::id();
                    $rateob->stock_unit_id        = $rate['stock_unit_id'];
                    $rateob->item_id                = $rate['item_id'];
                    $rateob->rate                   = $rate['rate'];
                    $rateob->conversion_factor      = $rate['conversion_factor'];
                    $rateob->discount               = isset($rate['discount'])?$rate['discount']:0;
                    $rateob->specifications         = isset($rate['specifications'])?$rate['specifications']:'';
                    $rateob->supplier_id          = $rate['supplier_id'];
                    $rateob->purchase_unit_id     = $rate['purchase_unit_id'];
                    $rateob->tax_name             = $rate['tax_name'];
                    $rateob->tax_code             = $rate['tax_code'];
                    $rateob->tax_value            = $rate['tax_value'];
                    $rateob->item_weight          = $rate['item_weight'];
                    $rateob->currency             = $rate['currency'];
                    $rateob->exchange_rate        = $rate['exchange_rate'];
                    $rateob->is_default             = isset($rate['is_default'])?$rate['is_default']:'';
                    $rateob->quatation_no           = isset($rate['quatation_no'])?$rate['quatation_no']:'';
                    $rateob->quatation_date         = isset($rate['quatation_date'])?$rate['quatation_date']:null;
                    $rateob->remarks             = isset($rate['remarks'])?$rate['remarks']:''; 

                    $rateob->save();
                    if(isset($rate['is_default']) && $rate['is_default'] == true){
                        $item = Item::find($rate->item_id);
                        $item->list_price = $rate['rate'] * $rate['conversion_factor'] * $rate['item_weight'] * $rate['exchange_rate'] ;
                        $item->save();
                    }
                }
            }
        //end of foreach
        
        

        
        return 'saved!';


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rates::where('id',$id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function edit(Rates $rates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rates = Rates::find($id);
        $rates->customer_id = $request->customer_id;
        $rates->purchase_unit = $request->purchase_unit;
        $rates->rate = $request->rate;
        $rates->conversion_factor = $request->conversion_factor;
        $rates->discount = $request->discount;
        $rates->specifications = $request->specifications;
        $rates->updated_by = Auth::id();
        $rates->save();
        if(isset($request->default)){
            $item = Item::find(Stock::find($rates->item_id)->item_id);
            $item->list_price = $rates->rate;
            $item->save();
        }
        return 'True';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rates  $rates
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rates $rates)
    {
        //
    }


    public function rateByItem($id)
    {
       return $rates = Rates::where('item_id',$id)->get();
    }
}
