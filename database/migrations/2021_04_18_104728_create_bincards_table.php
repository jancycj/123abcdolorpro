<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBincardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bincards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->date('transaction_date');
            $table->enum('transanction_type',['I','R']);
            $table->integer('transaction_code');
            $table->integer('item_id')->nullable();
            $table->integer('item_slno')->nullable();
            $table->string('reference_no')->nullable();
            $table->date('reference_date')->nullable();
            $table->float('opening_stock')->nullable();
            $table->float('opening_value')->nullable();
            $table->float('transaction_qty')->nullable();
            $table->float('trasaction_value')->nullable();
            $table->float('closing_stock')->nullable(); 
            $table->float('closing_value')->nullable();
            $table->integer('transaction_by')->nullable();
            $table->string('computer_name')->nullable();
            $table->string('store_code')->nullable();
            $table->string('batch_no')->nullable();
            $table->date  ('batch_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('bincards');
    }
}
