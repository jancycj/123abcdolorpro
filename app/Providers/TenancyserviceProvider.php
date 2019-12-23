<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class TenancyserviceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
    }

    public function register(){
        if($this->app->runningInConsole()){
            return;
        }
    
       
          config(['database.connections.tenant.database' => 'tenant1']);
        
          DB::purge('tenant');
        
          DB::reconnect('tenant');
    }
}
