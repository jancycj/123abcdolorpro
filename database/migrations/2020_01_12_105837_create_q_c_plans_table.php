<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQCPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('q_c_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('comapny_id')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->string('qc_parameter')->nullable();
            $table->string('qc_value')->nullable();
            $table->integer('qc_serial_no')->nullable();
            $table->string('qc_tollarence')->nullable();
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
        Schema::dropIfExists('q_c_plans');
    }
}
