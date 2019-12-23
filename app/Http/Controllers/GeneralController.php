<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\VacancyCreated;
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
}
