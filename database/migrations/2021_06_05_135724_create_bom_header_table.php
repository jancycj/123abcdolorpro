<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBomHeaderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bom_header', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company'); 
            $table->integer('parent_item_id');
            $table->string('parent_item');
            $table->string('parent_type');
            $table->string('parent_qty');
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
        Schema::dropIfExists('bom_header');
    }
}
