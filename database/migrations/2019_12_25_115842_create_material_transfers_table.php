<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_no')->nullable();
            $table->unsignedInteger('item_id')->nullable();
            $table->unsignedInteger('unit_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->unsignedInteger('ship_from')->nullable();
            $table->unsignedInteger('ship_to')->nullable();
            $table->enum('status', ['sent', 'accepted' ,'rejected','reworked']);
            $table->unsignedInteger('created_by')->nullable();
            $table->text('purpose')->nullable();
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
        Schema::dropIfExists('material_transfers');
    }
}
