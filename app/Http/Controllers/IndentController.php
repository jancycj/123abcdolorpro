<?php

namespace App\Http\Controllers;

use App\Indent;
use App\IndentDetails;
use Illuminate\Http\Request;
use Auth;

class IndentController extends Controller
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
        $this->validate($request, [
            'indent_no'     => 'required',
        ]);
        $indent = new Indent();
        $indent->request_date = now();
        $indent->department   = $request->department;
        $indent->request_by   = Auth::id();
        $indent->save();
        $indent_id = $indent->id;
        $items = $request->items;
        foreach($items as $item){
            $indentDetails = new IndentDetails();
            $indentDetails->request_id = $indent_id;
            $indentDetails->request_date = now();
            $indentDetails->item_id = $item['item_id'];
            $indentDetails->uom = $item['unit_id'];
            $indentDetails->puchased_qty = $item['qty'];
            $indentDetails->default_supplier = 1;
            // $indentDetails->need_by_date = $item->item_id;
            $indentDetails->updated_by = Auth::id();
            $indentDetails->save();
        }
        return 'true';
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
    public function show(Indent $indent)
    {
        //
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
        //
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
}
