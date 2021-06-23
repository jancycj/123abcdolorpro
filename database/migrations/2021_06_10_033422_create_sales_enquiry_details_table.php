<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesEnquiryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_enquiry_details', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('header_id'); 
           $table->integer('item_id'); 
           $table->string('part_no'); 
           $table->string('product_family')->nullable(); 
           $table->text('part_name')->nullable(); 
           $table->string('qty')->nullable(); 
           $table->string('uom')->nullable(); 
           $table->string('rate')->nullable(); 
           $table->string('quote_qty')->nullable(); 
           $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('sales_enquiry_details');
    }
}
