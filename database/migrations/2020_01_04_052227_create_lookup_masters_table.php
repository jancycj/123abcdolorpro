<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLookupMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lookup_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lookup_key')->nullable();
            $table->string('lookup_value')->unique()->nullable();
            $table->string('lookup_description')->nullable();
            $table->string('genaral_value')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('lookup_masters');
    }
}
