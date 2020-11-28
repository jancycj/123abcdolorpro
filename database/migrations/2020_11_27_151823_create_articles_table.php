<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('article_no')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
            $table->float('weight_factor')->nullable();
            $table->string('desc')->nullable();
            $table->string('assortment_yn')->nullable();
            $table->string('tkt')->nullable();
            $table->integer('length')->nullable();
            $table->string('carton_no')->nullable();
            $table->integer('clu')->nullable();
            $table->integer('clu_per_carton')->nullable();
            $table->integer('no_box')->nullable();
            $table->integer('no_carton')->nullable();
            $table->integer('no_tube_per_box')->nullable();
            $table->string('thread_qlty')->nullable();
            $table->float('gauge')->nullable();
            $table->integer('min_lenhth')->nullable();
            $table->integer('max_length')->nullable();
            $table->float('weight')->nullable();
            $table->string('color')->nullable();
            $table->string('count')->nullable();
            $table->string('thread_type')->nullable();
            $table->integer('no_of_cop_per_tray')->nullable();
            $table->integer('no_cops_per_tray_line')->nullable();
            $table->integer('per_shift_production')->nullable();
            $table->integer('box_per_g2y')->nullable();
            $table->integer('no_of_spindle')->nullable();
            $table->string('grey_yarn_no')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('status')->nullable();
            $table->string('count1')->nullable();
            $table->string('wbc')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
