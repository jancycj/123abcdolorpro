<?php

namespace App\Http\Controllers;

use App\CompanyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Auth;

class QuickController extends Controller
{    
    /**
     * customers
     *
     * @return void
     */
    public function customers(Request $request)
    {
        $limit = $request->has('limit') ? $request->limit : 10;
        $code = $request->has('code') ? $request->code : '';
        $name = $request->has('name') ? $request->name : '';
        return DB::table('costomers')->select('id','name','short_name','customer_code')
        ->where(function ($q) use($code, $name){
           if($code != ''){
                $q->where('customer_code','like','%'.$code.'%');
           }
           if($name != ''){
                $q->orWhere('name','like','%'.$name.'%');
           }
        })
        ->where(function ($q) use($request){
            if($request->is_customer != 'false'){
                 $q->where('type','reseller');
            }
         })
        
        ->limit($limit)->get();
    }    
    /**
     * items
     *
     * @return void
     */
    public function items(Request $request)
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $limit = $request->has('limit') ? $request->limit : 10;
        $code = $request->has('code') ? $request->code : '';
        $name = $request->has('name') ? $request->name : '';
        return DB::table('items')->select(
            'items.id',
            'items.name',
            'items.part_no',
            'items.part_type',
            'items.unit_id',
            'items.category_id',
            'items.list_price',
            'lu.lookup_value as unit',
            'lu.lookup_description as unit_des',
            'lc.lookup_value as category',
            'lc.lookup_description as category_des'
            )
        ->join('lookup_masters as lc', 'items.category_id', '=', 'lc.id')
        ->join('lookup_masters as lu', 'items.unit_id', '=', 'lu.id')
        ->where(function ($q) use($code, $name){
           if($code != ''){
                $q->where('name','like','%'.$code.'%');
                $q->orWhere('part_no','like','%'.$code.'%');
           }
           
        })
        ->where('items.company_id',$company_id)
        ->limit($limit)->get();
    }  

    /**
     * itemsbom
     *
     * @return void
     */
    public function itemsbom(Request $request)
    {
        $company_id = CompanyUser::where('user_id',Auth::id())->pluck('company_id')->first();
        $limit = $request->has('limit') ? $request->limit : 10;
        $code = $request->has('code') ? $request->code : '';
        $name = $request->has('name') ? $request->name : '';
        return DB::table('items')->select(
            'items.id',
            'items.name',
            'items.part_no',
            'items.part_type',
            'items.unit_id',
            'items.category_id',
            'lu.lookup_value as unit',
            'lu.lookup_description as unit_des',
            'lc.lookup_value as category',
            'lc.lookup_description as category_des'
            )
        ->join('lookup_masters as lc', 'items.category_id', '=', 'lc.id')
        ->join('lookup_masters as lu', 'items.unit_id', '=', 'lu.id')
        ->leftJoin('bom_header as bom_hd', 'items.id', '=', 'bom_hd.item_id')
        ->where(function ($q) use($code, $name){
           if($code != ''){
                $q->where('name','like','%'.$code.'%');
                $q->orWhere('part_no','like','%'.$code.'%');
           }
           
        })
        ->where('items.company_id',$company_id)
        ->limit($limit)->get();
    }  
    /**
     * general
     *
     * @param  mixed $request
     * @return void
     */
    public function general(Request $request)
    {
        try {
            $this->validate($request, [
                'table'         => 'required',
                'fields'                => 'required | array',
            ]);
            
            $search = $request->has('search')?$request->search: '';
            $where_value = $request->has('where_value')?$request->where_value: '';
            $where_field = $request->has('where_field')?$request->where_field: '';
            $search_filed = $request->has('search_filed')?$request->search_filed: '';
            $data = DB::table($request->table)
            ->where(function ($q) use($search,$search_filed,$where_field,$where_value){
                
                if($where_field != ''){
                    $q->where($where_field,$where_value);
                }
                if($search != ''){
                    $q->where($search_filed,'like','%'.$search.'%');
                }
            });
            foreach($request->fields as $ex_c){
                $data = $data->addSelect($ex_c);
            }
                $data =  $data->limit(10)->get();

            return response(['message' => 'success', 'data' =>$data],200);

        } catch(Throwable $e){

            return response(['message' => 'error', 'data' =>$e],200);
        }
    }
    /**
     * general
     *
     * @param  mixed $request
     * @return void
     */
    public function rawGeneral(Request $request)
    {
        
        // dd(DB::getQueryLog());
        $v = $request->qry;
            // try {
            $this->validate($request, [
                'qry'         => 'required',
            ]);
            DB::enableQueryLog();
        $data = DB::select($request->qry);
            return response(['message' => 'success', 'data' =>$data],200);

        // } catch(Throwable $e){

        //     return response(['message' => 'error', 'data' =>$request->query],200);
        // }
    }
}
