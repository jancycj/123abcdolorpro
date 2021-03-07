<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\VacancyCreated;
use App\Helpers\DocNo;
use App\LookupMaster;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function redis()
    {
        // Config::set('database.connections.tenant.database', 'tenent1');
        // Config::set('database.default', 'tenant');
        // DB::reconnect('tenant');
        // config(['database.connections.tenant.database' => 'tenant1']);
        Config::set('database.connections.tenant.database', 'tenent1');
        DB::purge('mysql');

        DB::reconnect('tenant');
        return DB::select('select * from users');
        $order = 'got the event as i thought';
        event(new VacancyCreated($order));
        return 'good';
    }
    public function multi()
    {
        return DB::select('select * from users');
        dd('redis');
    }

    /*
    get taxes 
    **/
    public function get_taxes(Request $request)
    {
        if($request->has('json')){

            return LookupMaster::where('lookup_key','TAX')->get();

        }

    }
    /*
    get departments 
    **/
    public function get_departments(Request $request)
    {
        if($request->has('json')){

            return LookupMaster::where('lookup_key','DEPARTMENT')->get();

        }

    }
    /*
    get departments 
    **/
    public function get_currency(Request $request)
    {
        if($request->has('json')){

            return LookupMaster::where('lookup_key','CURRENCY')->get();

        }

    } 
    /*
    get departments 
    **/
    public function get_lookup(Request $request)
    {
        if($request->has('json')){

            return LookupMaster::where('lookup_key',$request->key)->get();

        }

    }
    public function get_doc(Request $request)
    {
        if($request->has('no_id')){
            $no = $request->no_id;
            $doc = DocNo::getDocNumber($no,1);
            return response(["doc_no" => $doc, 'sys_date' => date("Y-m-d")],200);
        }
    }

    
}
