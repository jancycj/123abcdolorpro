<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return DB::table('costomers')->select('id','name','short_name')
        ->where(function ($q) use($code, $name){
           if($code != ''){
                $q->where('short_name','like','%'.$code.'%');
           }
           if($name != ''){
                $q->orWhere('name','like','%'.$name.'%');
           }
        })
        ->limit($limit)->get();
    }
}
