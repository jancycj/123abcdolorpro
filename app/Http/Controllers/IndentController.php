<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use App\Helpers\DocNo;
use App\Indent;
use App\IndentDetails;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class IndentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('details')){
         //  $doc = DocNo::getDocNumber('ind',1);
            return response($doc,200);
        }
        // return DocNo::getDocNumber('ind',1);
      
        $units = [];
        $categories = [];
        // if($request->has('assortment_no')){
        //     return Indent::with('assortment_shades')->where('assortment_no',$request->assortment_no)->first();
        // }
        return view('v1.colorpro.company.indent',compact('units','categories'));
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
        var_dump($request->post());
       $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $indent = new Indent();
       $indent->request_date = now();
    // echo " ".  $indent->company_id   = $company_id;
       $indent->department   = $request->department;
       $indent->product_group   = $request->product_group;
       $indent->indent_no   =  DocNo::getDocNumberString('ind',1);
       $indent->request_by   = Auth::id();
         $indent->save();
        $indent_id = $indent->id;
        $items = $request->items;
        foreach($items as $item){
            $indentDetails = new IndentDetails();
         echo "/".   $indentDetails->request_id = $indent_id;
         echo "/".  $indentDetails->request_date = now();
         echo "/".   $indentDetails->need_by_date = $item['need_by_date'];
         echo "/".   $indentDetails->item_id = $item['item_id'];
         echo "/".   $indentDetails->uom = $item['unit'];
         echo "/".   $indentDetails->quantity = $item['qty'];
         echo "/".   $indentDetails->puchased_qty = 0;
         echo "/".   $indentDetails->default_supplier = 1;
            // $indentDetails->need_by_date = $item->item_id;
            echo "/".  $indentDetails->updated_by = Auth::id();
            $indentDetails->save();
        }
        $doc = DocNo::updateDoc('ind',1);
       // return 'true';
        // $indent->product_group   = $request->product_group ;
        // $indent->approved_by   = $request->approved_by ;
        // $indent->approved_date = $request->approved_date ;
        
        
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Indent  $indent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //echo $id;
    $ind_det =  Indent::where('id',$id)->with('items')->first();
       var_dump($ind_det);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Indent  $indent
     * @return \Illuminate\Http\Response
     */
    public function edit(Indent $indent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Indent  $indent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Indent $indent)
    {
        $indent->department   = $request->department;
        $indent->product_group   = $request->product_group;
        $indent->save();
        $indent_id = $indent->id;
        $items = $request->items;
        IndentDetails::where('request_id',$indent_id)->delete();
        foreach($items as $item){
            $indentDetails = new IndentDetails();
            $indentDetails->request_id = $indent_id;
            $indentDetails->need_by_date = $item['need_by_date'];
            $indentDetails->item_id = $item['item_id'];
            $indentDetails->uom = $item['unit'];
            $indentDetails->quantity = $item['qty'];
            $indentDetails->puchased_qty = 0;
            $indentDetails->default_supplier = 1;
            // $indentDetails->need_by_date = $item->item_id;
            $indentDetails->updated_by = Auth::id();
            $indentDetails->save();
        }
        return 'true';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Indent  $indent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Indent $indent)
    {
        //
    }
    
    /**
     * getIndentItem
     *
     * @param  mixed $request
     * @return void
     */
    public function getIndentItem(Request $request)
    {
        if($request->has('indent_no') && $request->has('party')){
            $indent_no = $request->indent_no;
            $party = $request->party;
            $data = DB::table('indent_details as indd')
            ->join('indents as ind', 'indd.request_id', '=', 'ind.id')
            ->join('items as ite', 'indd.item_id', '=', 'ite.id')
            ->leftJoin('rates as rt', 'indd.item_id', '=', 'rt.item_id')
            // ->leftJoin('lookup_masters as lk', 'rt.currency_id', '=', 'lk.lookup_value')
            ->leftJoin('lookup_masters as lkv', 'rt.purchase_unit_id', '=', 'lkv.id')
            ->where('ind.indent_no', '=',$indent_no)
            ->where('ite.default_supplier', '=',$party)
            ->select(
                'ind.indent_no',
                'indd.item_id',
                'ite.name as item',
                'ite.name as item_name',
                'ite.part_no',
                'ite.default_supplier',
                'indd.need_by_date',
                'rt.discount',
                'rt.specifications',
                'rt.currency',
                'rt.rate as basic_rate',
                'rt.stock_unit_id',
                // 'rt.primary_unit',
                'rt.purchase_unit_id',
                'rt.conversion_factor',
                'rt.exchange_rate',
                'rt.tax_name',
                'rt.tax_code',
                'rt.tax_value',
                'rt.rate',
                // 'lk.genaral_value as currency',
                'lkv.lookup_value as purchase_unit',
                DB::raw("IFNULL(indd.need_by_date,DATE_ADD(CURDATE() , INTERVAL 15 DAY)) as date"),
                DB::raw("(IFNULL(indd.quantity,0)) - (IFNULL(indd.puchased_qty,0)) as quantity"),
                DB::raw(" rt.rate * (IFNULL(rt.exchange_rate,1)) * (IFNULL(rt.conversion_factor,1)) * (IFNULL(rt.item_weight,1)) as rate_with_exchange"),
                // DB::raw("indd.quantity * rt.rate * (IFNULL(rt.exchange_rate,1)) * (IFNULL(rt.conversion_factor,1)) * (IFNULL(rt.item_weight,1)) as sub_total"),
                // DB::raw("(indd.quantity * rt.rate * (IFNULL(rt.exchange_rate,1))* (IFNULL(rt.conversion_factor,1)) * (IFNULL(rt.item_weight,1)) )  - (indd.quantity * rt.rate *(IFNULL(rt.exchange_rate,1)) * (IFNULL(rt.conversion_factor,1)) * (IFNULL(rt.item_weight,1)) ) * ((IFNULL(rt.discount,0))/100)  as grant_total")
                DB::raw(" rt.rate - (rt.rate * ((IFNULL(rt.discount,0))/100))  as sub_total"),
                DB::raw(" (rt.rate - (rt.rate * ((IFNULL(rt.discount,0))/100))) * indd.quantity   as grant_total")


                )
            ->get();
            return $data;
            
        }
        return 'tt';
    }
}
