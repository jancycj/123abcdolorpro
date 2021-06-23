<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesEnquiryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_enquiry', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->integer('company'); 
           $table->integer('enquiry_no'); 
           $table->date('enquiry_date'); 
           $table->integer('customer_id'); 
           $table->string('enquiry_type')->nullable(); 
           $table->integer('registerd_by')->nullable(); 
           $table->string('mod_of_enquiry')->nullable(); 
           $table->string('contact_person')->nullable(); 
           $table->string('designation')->nullable(); 
           $table->string('contact_no')->nullable(); 
           $table->enum('status',['registerd','closed', 'short_closed'])->default('registerd');
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
        Schema::dropIfExists('sales_enquiry');
    }
}
