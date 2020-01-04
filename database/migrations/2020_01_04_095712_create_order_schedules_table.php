<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_details_id')->nullable();
            $table->float('quantity')->nullable();
            $table->date('delivery_date')->nullable();
            $table->enum('status',['active','inactive', 'blocked']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_schedules');
    }
}
