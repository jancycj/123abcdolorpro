<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultBuyerToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('default_supplier')->nullable()->after('status');
            $table->string('default_buyer')->nullable();
            $table->float('weight_average_rate')->nullable();
            $table->string('item_weight')->nullable();
            $table->float('rol_minimum_qty')->nullable();
            $table->float('rol_maximum_qty')->nullable();
            $table->float('rol_qty')->nullable();
            $table->float('over_reciept_percentage')->nullable();
            $table->float('purchase_cost')->nullable();
            $table->string('gst_cost')->nullable();
            $table->float('other_cost')->nullable();
            $table->float('labor_cost')->nullable();
            $table->float('material_cost')->nullable();
            $table->float('total_cost')->nullable();
            $table->float('last_po_rate')->nullable();
            $table->date('last_po_date')->nullable();
            $table->string('last_po_supplier')->nullable();
            $table->string('inspection_yn')->nullable();        
            $table->string('abc_class')->nullable();            
            $table->string('fsn')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('default_supplier');
            $table->dropColumn('default_buyer');
            $table->dropColumn('weight_average_rate');
            $table->dropColumn('item_weight');
            $table->dropColumn('rol_minimum_qty');
            $table->dropColumn('rol_maximum_qty');
            $table->dropColumn('rol_qty');
            $table->dropColumn('over_reciept_percentage');
            $table->dropColumn('purchase_cost');
            $table->dropColumn('gst_cost');
            $table->dropColumn('other_cost');
            $table->dropColumn('labor_cost');
            $table->dropColumn('material_cost');
            $table->dropColumn('total_cost');
            $table->dropColumn('last_po_rate');
            $table->dropColumn('last_po_date');
            $table->dropColumn('last_po_supplier');
            $table->dropColumn('inspection_yn');        
            $table->dropColumn('abc_class');           
            $table->dropColumn('fsn');  
        });
    }
}
