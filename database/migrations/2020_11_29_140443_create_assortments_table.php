<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssortmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assortments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->string('article_no')->nullable();
            $table->string('assortment_no')->nullable();
            $table->string('assortment_name')->nullable();
            $table->integer('slno')->nullable();
            $table->string('shade_code')->nullable();
            $table->string('shade_name')->nullable();
            $table->integer('no_of_shades')->nullable();
            $table->integer('no_of_box_per_box')->nullable();
            $table->string('image_url')->nullable();
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExists('assortments');
    }
}
