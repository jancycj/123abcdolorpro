<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('comapny_id')->nullable();
            $table->string('order_number')->nullable();
            $table->date('order_date')->nullable();
            $table->unsignedInteger('suppier_id')->nullable();
            $table->unsignedInteger('billto_customer_id')->nullable();
            $table->string('order_type')->nullable();
            $table->integer('amendment_no')->nullable();
            $table->date('amendment_date')->nullable();
            $table->unsignedInteger('shipto_customer_id')->nullable();
            $table->string('quote_ref_no')->nullable();
            $table->date('quote_ref_date')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('approved_by')->nullable();
            $table->date('approved_date')->nullable();
            $table->unsignedInteger('currency')->nullable();
            $table->double('exchange_rate', 8, 2)->nullable();
            $table->float('basic_total')->nullable();
            $table->float('sub_total')->nullable();
            $table->float('pnf_total')->nullable();
            $table->float('courrier_charge')->nullable();
            $table->unsignedInteger('tax_id')->nullable();
            $table->double('tax_percent', 8, 2)->nullable();
            $table->float('tax_amount')->nullable();
            $table->float('grant_total')->nullable();
            $table->enum('status',['active','pending','completed','processing','accepted','inactive','closed','short_closed']);
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
        Schema::dropIfExists('orders');
    }
}
