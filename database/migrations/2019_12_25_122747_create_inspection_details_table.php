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
            $table->string('ref_no')->nullable();
            $table->unsignedInteger('material_transfers_id')->nullable();
            $table->integer('accepted_quantity')->nullable();
            $table->integer('reworked_quantity')->nullable();
            $table->float('rejected_quantity')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->enum('type', ['mt', 'oa']);
            $table->date('inspection_date')->nullable();
            $table->unsignedInteger('inspected_by')->nullable();
            $table->text('reason')->nullable();
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
