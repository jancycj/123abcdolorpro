<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('indent_no')->nullable();
            $table->date('request_date')->nullable();
            $table->string ('department')->nullable();
            $table->integer('request_by')->nullable();
            $table->string('product_group')->nullable();
            $table->integer('approved_by')->nullable();
            $table->date('approved_date')->nullable();
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
        Schema::dropIfExists('indents');
    }
}
