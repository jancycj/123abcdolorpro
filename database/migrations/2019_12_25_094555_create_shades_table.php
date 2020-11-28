<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('colour')->nullable();
            $table->string('code')->nullable();
            $table->integer('priority')->nullable();
            $table->unsignedInteger('customer_id')->nullable();
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
        Schema::dropIfExists('shades');
    }
}
