<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('supplier_id')->nullable();
            $table->unsignedInteger('stock_unit_id')->nullable();
            $table->unsignedInteger('purchase_unit_id')->nullable();
            $table->double('rate', 8, 2)->nullable();
            $table->double('conversion_factor', 8, 2)->nullable();
            $table->double('discount', 8, 2)->default(0);
            $table->string('specifications')->nullable();
            $table->string('tax_name')->nullable();
            $table->string('tax_code')->nullable();
            $table->double('tax_value', 8, 2)->default(0);
            $table->double('item_weight', 8, 2)->default(0);
            $table->string('currency')->nullable();
            $table->string('quatation_no')->nullable();
            $table->date('quatation_date')->nullable();
            $table->double('exchange_rate', 8, 2)->default(0);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->boolean('is_default')->nullable()->default(0);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('rates');
    }
}
