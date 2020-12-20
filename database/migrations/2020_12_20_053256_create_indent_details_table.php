<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indent_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('request_id')->nullable();
            $table->date('request_date')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->float('quantity')->nullable();
            $table->string('uom')->nullable();
            $table->float('puchased_qty')->nullable();
            $table->string('default_supplier')->nullable();
            $table->date('need_by_date')->nullable();
            $table->integer('updated_by')->nullable();
            $table->date('updated_date')->nullable();
            $table->enum('status',['R','S','C']);
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
        Schema::dropIfExists('indent_details');
    }
}
