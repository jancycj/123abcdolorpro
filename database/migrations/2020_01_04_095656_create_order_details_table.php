<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->float('rate')->nullable();
            $table->float('quantity')->nullable();
            $table->float('recieved_quantity')->nullable();
            $table->float('accepted_quantity')->nullable();
            $table->float('rework_quantity')->nullable();
            $table->float('rejected_quantity')->nullable();
            $table->float('returned_quantity')->nullable();
            $table->unsignedInteger('purchase_unit_id')->nullable();
            $table->unsignedInteger('primary_unit_id')->nullable();
            $table->float('conversion_factor')->nullable();
            $table->date('delivery_date')->nullable();
            $table->enum('status',['active','inactive', 'blocked','completed','pending']);
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
        Schema::dropIfExists('order_details');
    }
}
