<?php

namespace App\Http\Controllers;
use App\Helpers\DocNo;
use App\CompanyUser;
use App\BomHeader;
use App\BomEntry;
use App\Item;
use Illuminate\Http\Request;

class BomHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
         return view('v1.colorpro.company.bomentry');
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

       $bomHeader   = new BomHeader();
        $bomHeader->company  = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
        $bomHeader->parent_item_id        = $request->parent_item_id;
        $bomHeader->parent_item           = $request->parent_item;
        $bomHeader->parent_type           = $request->parent_type;
        $bomHeader->parent_qty            = $request->parent_qty;
        $bomHeader->save();
        $bom_id                           = $bomHeader->id ;
        $items                            = $request->items;
        foreach($items as $item){ 
  
        $bOMEntry                        = new BOMEntry();
        $bOMEntry->company               = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
        $bOMEntry->header_id             =  $bom_id ;
        $bOMEntry->parent_item_id             = $request->parent_item_id;
        $bOMEntry->parent_item           = $request->parent_item;
        $bOMEntry->parent_type           = $request->parent_type;
        $bOMEntry->parent_qty            = $request->parent_qty;
        $bOMEntry->child_item_id         = $item['child_item_id'];
        $bOMEntry->child_item            = $item['child_item'];
        $bOMEntry->child_type            = $item['child_type'];
        $bOMEntry->child_qty             = $item['child_qty'];
        $bOMEntry->child_uom             = $item['child_uom'];
        $bOMEntry->save();
       
       }

      
       return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BomHeader  $bomHeader
     * @return \Illuminate\Http\Response
     */
    public function show($part_no)
    {
      
     if (BomHeader::where('parent_item',$part_no)->count() > 0) {
         $bom_itm = BomHeader::where('parent_item',$part_no)->first();
         return BomHeader::where('id',$bom_itm->id)->with('items')->first();
        }
       else {
         return null;
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BomHeader  $bomHeader
     * @return \Illuminate\Http\Response
     */
    public function edit(BomHeader $bomHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BomHeader  $bomHeader
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BomHeader $bomHeader)
    {
       
           $bomHeader      = BomHeader::where('id',$request->id)->first();
           $bom_id         = $bomHeader->id ;
           $items          = $request->items;

           BomEntry::where('header_id',$bom_id)->delete();
          foreach($items as $item){ 

          $bOMEntry = new BomEntry();
          $bOMEntry->company  = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
         $bOMEntry->header_id             = $bom_id ;
         $bOMEntry->parent_item_id        = $request->parent_item_id;
         $bOMEntry->parent_item           = $request->parent_item;
         $bOMEntry->parent_type           = $request->parent_type;
         $bOMEntry->parent_qty            = $request->parent_qty;
         $bOMEntry->child_item_id         = $item['child_item_id'];
         $bOMEntry->child_item            = $item['child_item'];
         $bOMEntry->child_type            = $item['child_type'];
         $bOMEntry->child_qty             = $item['child_qty'];
         $bOMEntry->child_uom             = $item['child_uom'];
         $bOMEntry->save();
     
       
     }
         return response(['message' => 'successfully saved'],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BomHeader  $bomHeader
     * @return \Illuminate\Http\Response
     */
    public function destroy(BomHeader $bomHeader)
    {
        //
    }
}
