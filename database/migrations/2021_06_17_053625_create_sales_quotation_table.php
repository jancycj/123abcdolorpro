<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesQuotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_quotation', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('company_id'); 
           $table->integer('quote_no'); 
           $table->date('quote_date'); 
           $table->integer('customer_id'); 
           $table->integer('enquiry_no'); 
           $table->date('enquiry_date')->nullable(); 
           $table->string('contact_person')->nullable(); 
           $table->string('contact_no')->nullable(); 
           $table->string('prepared_by')->nullable(); 
           $table->string('authorized_by')->nullable(); 
           $table->double('gst_tariff', 8, 2)->nullable();
           $table->string('gst_perc')->nullable();
           $table->double('gst_value', 8, 2)->nullable();
           $table->double('pf_perc', 8, 2)->nullable();
           $table->double('tcs_perc', 8, 2)->nullable();
           $table->string('currency')->nullable();
           $table->double('exchange_rate', 8, 2)->nullable();
           $table->float('pf_amount')->nullable();
           $table->float('courier_charge')->nullable();
           $table->float('gst_amount')->nullable();
           $table->float('tcs_amount')->nullable();
           $table->float('basic_total')->nullable();
           $table->float('sub_total')->nullable();
           $table->float('grant_total')->nullable();
           $table->string('performa_no')->nullable(); 
           $table->date('performa_date')->nullable(); 
           $table->string('customer_order_no')->nullable(); 
           $table->date('customer_order_date')->nullable(); 
           $table->enum('status',['active','pending','completed','processing','accepted','inactive','closed','short_closed'])->default('active');
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
        Schema::dropIfExists('sales_quotation');
    }
}
