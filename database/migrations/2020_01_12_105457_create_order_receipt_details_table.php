<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReceiptDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('order_receipt_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_receipt_header_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('order_detail_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->float('accepted_quantity')->nullable();
            $table->float('recieved_quantity')->nullable();
            $table->float('rework_quantity')->nullable();
            $table->float('rejected_quantity')->nullable();
            $table->float('store_accepted_quantity')->nullable();
            $table->float('conversion_factor')->nullable();
            $table->float('rate')->nullable();
            $table->string('tax_name')->nullable();
            $table->float('tax_value')->nullable();
            $table->float('tcs')->nullable();
            $table->text('rework_reason')->nullable();
            $table->text('reject_reason')->nullable();
            $table->string('uom')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->enum('status',['pending','active','inactive', 'blocked','completed','stocked']);
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
        Schema::dropIfExists('order_receipt_details');
    }
}
