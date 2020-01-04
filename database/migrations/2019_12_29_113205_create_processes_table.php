<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('item_id')->nullable();
            $table->string('operation_no')->unique()->nullable();
            $table->string('process_code')->nullable();
            $table->string('process_description')->nullable();
            $table->string('process_mode')->nullable();
            $table->string('section')->nullable();
            $table->double('oprn_ts', 8, 2)->nullable();
            $table->double('oprn_to', 8, 2)->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->string('responsible_person')->nullable();
            $table->string('scrap_code')->nullable();
            $table->string('scrap_persentage')->nullable();
            $table->string('process_item_id')->nullable();
            $table->string('mechine_no')->nullable();
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
        Schema::dropIfExists('processes');
    }
}
