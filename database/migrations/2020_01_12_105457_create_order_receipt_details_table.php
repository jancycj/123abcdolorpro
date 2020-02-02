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
            $table->unsignedInteger('order_details_id')->nullable();
            $table->float('accepted_quantity')->nullable();
            $table->float('recieved_quantity')->nullable();
            $table->float('rework_quantity')->nullable();
            $table->float('rejected_quantity')->nullable();
            $table->date('delivery_date')->nullable();
            $table->text('rework_reason')->nullable();
            $table->text('reject_reason')->nullable();
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
