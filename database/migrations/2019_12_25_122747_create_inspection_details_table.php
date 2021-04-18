<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('order_receipt_details_id')->nullable();
            $table->float('conditionally_accepted_quantity')->nullable();
            $table->float('accepted_quantity')->nullable();
            $table->float('reworked_quantity')->nullable();
            $table->float('rejected_quantity')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->enum('type', ['p', 's']);
            $table->date('inspection_date')->nullable();
            $table->unsignedInteger('inspected_by')->nullable();
            $table->text('rework_reason')->nullable();
            $table->text('rejected_reason')->nullable();
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
        Schema::dropIfExists('inspection_details');
    }
}
