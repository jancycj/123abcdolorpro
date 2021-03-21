<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('side_menu',['Admin','Supply chain','Out Side Processing','Production Planning and Control','Production','Order Management','Costing','Shopfloor','other']);
            $table->string('parent_slug')->nullable();
            $table->string('slug')->unique();
            $table->string('menu')->nullable();
            $table->unsignedInteger('role_id')->nullable();
            $table->string('icon')->nullable();
            $table->string('url')->nullable()->default('#');
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
        Schema::dropIfExists('pages');
    }
}
