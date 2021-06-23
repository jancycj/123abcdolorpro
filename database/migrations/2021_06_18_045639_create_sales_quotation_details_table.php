<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_quotation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
           $table->integer('header_id'); 
           $table->integer('item_id'); 
           $table->string('part_no'); 
           $table->text('part_name')->nullable(); 
           $table->double('qty', 8, 2)->nullable();
           $table->string('uom')->nullable(); 
           $table->double('rate', 8, 2)->nullable();
           $table->double('discount', 8, 2)->nullable();    
           $table->double('net_rate', 8, 2)->nullable();
           $table->double('net_amount', 8, 2)->nullable();    
           $table->date('need_by_date')->nullable(); 
           $table->string('order_qty')->nullable();
           $table->string('rate_flag')->nullable(); 
           $table->enum('status',['active','inactive','blocked','completed','pending'])->default('active');
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
        Schema::dropIfExists('sales_quotation_details');
    }
}
