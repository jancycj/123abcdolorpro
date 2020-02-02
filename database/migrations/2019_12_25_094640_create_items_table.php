<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('part_no')->unique();;
            $table->unsignedInteger('unit_id')->nullable();
            $table->string('catelog_drwaing_no')->nullable();
            $table->string('hsn_code')->nullable();
            $table->string('rol')->nullable();
            $table->double('list_price', 8, 2)->nullable();
            $table->double('wt_average_rate', 8, 2)->nullable();
            $table->string('part_type')->nullable();
            $table->string('sourcing_code')->nullable();
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
        Schema::dropIfExists('items');
    }
}
