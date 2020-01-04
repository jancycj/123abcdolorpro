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
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('primary_unit')->nullable();
            $table->unsignedInteger('purchase_unit')->nullable();
            $table->double('rate', 8, 2)->nullable();
            $table->double('conversion_factor', 8, 2)->nullable();
            $table->double('discount', 8, 2)->nullable();
            $table->string('specifications')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
