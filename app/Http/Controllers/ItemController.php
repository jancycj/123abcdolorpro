<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyUser;
use App\Item;
use App\LookupMaster;
use App\Stock;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use Importer;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $units = LookupMaster::where('lookup_key','UNIT')->get();
        $categories = LookupMaster::where('lookup_key','ITEM CATEGORY')->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        $items =  Item::all();
        return view('v1.colorpro.admin.items',compact('items','user','units','categories'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('v1.company.create_items');//
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
            'name'     => 'required',
            'part_no'    => 'required',
            'category_id'    => 'required',
        ]);
        $company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $item = new Item;
        $item->name = $request->name;
        $item->company_id =$request->has('admin')? 0:$company_id ;
        $item->category_id = $request->category_id;
        $item->part_no = $request->part_no;
        $item->unit_id = $request->unit_id;
        $item->catelog_drwaing_no = $request->catelog_drwaing_no;
        $item->default_supplier = $request->default_supplier;
        $item->default_buyer = $request->default_buyer;
        $item->hsn_code = $request->hsn_code;
        $item->rol = $request->rol;
        $item->part_type = $request->part_type;
        $item->sourcing_code = $request->sourcing_code;
        $item->created_by = Auth::id();
        $item->updated_by = Auth::id();

        $item->save();

        $stock = new Stock;
        $stock->company_id  = $company_id ;
        $stock->item_id     = $item->id;
        $stock->unit_id     = $item->unit_id;
        $stock->created_by  = Auth::id();
        
        $stock->save();
        return 'true';

        // return redirect('/admin/items')->with(['message' => 'successfully added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $item;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
      
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->part_no = $request->part_no;
        $item->unit_id = $request->unit_id;
        $item->catelog_drwaing_no = $request->catelog_drwaing_no;
        $item->default_supplier = $request->default_supplier;
        $item->default_buyer = $request->default_buyer;
        $item->hsn_code = $request->hsn_code;
        $item->rol = $request->rol;
        $item->part_type = $request->part_type;
        $item->sourcing_code = $request->sourcing_code;
        $item->status = $request->status;
        $item->updated_by = Auth::id();
        $item->save();
        return 'True';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
    public function company_item()
    {
        $company_id = CompanyUser::where('user_id', Auth::id())->pluck('company_id')->first();
        $units = LookupMaster::where('lookup_key','UNIT')->get();
        $categories = LookupMaster::where('lookup_key','ITEM CATEGORY')->get();
        $user = User::where('id',Auth::id())->with('company')->first();
        $items =  Item::where('company_id',$company_id)->get();
        return view('v1.colorpro.company.item_master',compact('items','user','units','categories'));//
    }

    public function importPost(Request $request)
    {
        
        // $import = new ItemsImport;
        // Excel::import($import, 'item.xlsx');
        // $data = $import->data;
        // return $data;
        $file = $request->file('file');
        $excel = Importer::make('Excel');
        $excel->load($file);
        $collection = $excel->getCollection()->toArray();
        $a = $collection[0];
        $erors = [];
        foreach($collection as $key => $data){
            $message = "";

            if($key == 0){
                continue;
            }
            // $c = array_combine($a, $data);
            // return $c['Companyid'];
            if($data[0] == ''){
                $message = "company missing";
                continue;
            }
            if($data[1] == ''){
                $message = "part missing";
                continue;
            }
            if($data[7] == ''){
                $message = "category missing";
                continue;
            }
            if($data[4] == ''){
                $message = "unit missing";
                continue;
            }

            if($company_id = Company::where('name',$data[0])->pluck('id')->first()){
                if($category_id = LookupMaster::where('lookup_value',strtoupper($data[7]))->pluck('id')->first()){
                    if($unit_id = LookupMaster::where('lookup_value',strtoupper($data[4]))->pluck('id')->first()){
                        if(Item::where('part_no',$data[1])->first()){
                            $message = "item exists";
                            continue;
                        }
                        $item = new Item;
                        $item->name                 = $data[3];
                        $item->company_id           = $company_id ;
                        $item->category_id          = $category_id;
                        $item->part_no              = $data[1];
                        $item->unit_id              = $unit_id;
                        $item->part_type            = $data[5];
                        $item->list_price           = $data[11];
                        $item->created_by           = Auth::id();
                        $item->updated_by           = Auth::id();
                        $item->save();
                        $stock = new Stock;
                        $stock->company_id  = $company_id ;
                        $stock->item_id     = $item->id;
                        $stock->unit_id     = $item->unit_id;
                        $stock->quantity     = $data[9];
                        $stock->created_by  = Auth::id();
                        $stock->save();
                    } else{
                        $message = 'unit not found';
                    }
                } else {
                    $message = 'category not found';
                }
            } else{
                $message = 'company not found';
            }
            if($message != ""){
                array_push($erors,$message);
            }

            
        }
        return ['message' =>'true', 'data' => $erors];

    }

    public function import(Request $request)
    {
         //PDF file is stored under project/public/download/info.pdf
         $file= 'item.xlsx';

         $headers = [
               'Content-Type' => 'application/xlsx',
            ];
 
        return response()->download($file, 'filename.xlsx', $headers);
    }
}
