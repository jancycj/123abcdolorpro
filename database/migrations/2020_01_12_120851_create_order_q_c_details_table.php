<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderQCDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_q_c_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_details_id')->nullable();
            $table->unsignedInteger('qc_plan_id')->nullable();
            $table->string('result')->nullable();
            $table->string('remark')->nullable();
            $table->date('qc_date')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->enum('status',['passed','rejected', 'blocked']);
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
        Schema::dropIfExists('order_q_c_details');
    }
}
