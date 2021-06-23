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
      // echo "in aa";
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
//var_dump($request->post());
       $bomHeader   = new BomHeader();


       $bomHeader->header_id              =  DocNo::getDocNumberString('bom',1);
        $bomHeader->company  = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
        $bomHeader->parent_item           = $request->parent_item;
        $bomHeader->save();
        //$bom_id = $bomHeader->header_id ;
        $bom_id = $bomHeader->id ;
        $items = $request->items;
    foreach($items as $item){ 
  
        $bOMEntry                        = new BOMEntry();
        echo $bOMEntry->company  = CompanyUser::where('user_id', auth()->user()->id)->pluck('company_id')->first();
        echo   $bOMEntry->header_id             =  $bom_id ;
        echo  $bOMEntry->parent_item_id             = $request->parent_id;
        echo  $bOMEntry->parent_item           = $request->parent_item;
        echo  $bOMEntry->parent_type           = $request->parent_type;
        echo $bOMEntry->parent_qty            = $request->parent_qty;
     echo   $bOMEntry->child_item_id              = $item['child_item_id'];
     echo   $bOMEntry->child_item            = $item['child_item'];
     echo   $bOMEntry->child_type            = $item['child_type'];
     echo   $bOMEntry->child_qty             = $item['child_qty'];
      echo  $bOMEntry->child_uom             = $item['child_uom'];
      $bOMEntry->save();
       
       }

       $doc = DocNo::updateDoc('bom',1);
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
       // echo "in show".$part_no;
       $bom_itm = BomHeader::where('parent_item',$part_no)->first();
     // $bom_itm = BomHeader::find($part_no);
      // var_dump($bom_itm);
     // echo $bom_itm->exists();
        if($bom_itm->exists()==1){
             return BomHeader::where('id',$bom_itm->id)->with('items')->first();
        }else
        echo "sss";
       
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
        //
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
