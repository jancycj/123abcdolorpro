<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderReceiptHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_receipt_headers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('order_id')->nullable();
            $table->date('order_date')->nullable();
            $table->unsignedInteger('billto_customer_id')->nullable();
            $table->unsignedInteger('ship_customer_id')->nullable();
            $table->text('remark')->nullable();
            $table->string('vendor_dc_no')->nullable();
            $table->date('vendor_dc_date')->nullable();
            $table->string('vendor_invoice_no')->nullable();
            $table->date('vendor_invoice_date')->nullable();
            $table->string('gate_entry_no')->nullable();
            $table->date('gate_entry_date')->nullable();
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('order_receipt_headers');
    }
}
