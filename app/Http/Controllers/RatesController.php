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
        return view('v1.colorpro.company.rates',compact('customers','items','units'));
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
            'item'              => 'required|numeric',
            'customer'          => 'required|numeric',
            'rate'              => 'required|numeric',
            // 'discount'          => 'numeric',
            'pm_unit'           => 'required',
            'pr_unit'           => 'required',
        ]);
        if(Rates::where('item_id',$request->item)->where('customer_id',$request->customer)->first()){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'customer' => 'A Rate is already exist on this Supplier..!',
            ]);
            throw $error;
        }
        $rate = new Rates;
        $rate->company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $rate->item_id = $request->item;
        $rate->customer_id = $request->customer;
        $rate->primary_unit = $request->pm_unit;
        $rate->purchase_unit = $request->pr_unit;
        $rate->rate = $request->rate;
        $rate->conversion_factor = $request->c_factor;
        $rate->discount = $request->discount;
        $rate->specifications = $request->specifications;
        $rate->created_by = Auth::id();
        $rate->save();

        if(isset($request->default)){
            $item = Item::find(Stock::find($rate->item_id)->item_id);
            $item->list_price = $rate->rate;
            $item->save();
        }
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
}
