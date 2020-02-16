<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('parent_id')->default(0);
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->string('autherized_person')->nullable();
            $table->string('autherized_person_phone')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('company_code')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->text('address_line3')->nullable();
            $table->text('post_code')->nullable();
            $table->text('place')->nullable();
            $table->string('mobile_prefix')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('phone_prefix')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('company_reg_no')->nullable();
            $table->date('company_reg_date')->nullable();
            $table->string('cst_reg_no')->nullable();
            $table->date('cst_reg_date')->nullable();
            $table->string('lst_reg_no')->nullable();
            $table->date('lst_reg_date')->nullable();
            $table->string('ce_reg_no')->nullable();
            $table->date('ce_reg_date')->nullable();
            $table->string('ce_range')->nullable();
            $table->string('ce_division')->nullable();
            $table->string('ce_collectorate')->nullable();
            $table->string('service_tax_reg_no')->nullable();
            $table->string('pan_gir_no')->nullable();
            $table->string('ie_code')->nullable();
            $table->date('ie_reg_date')->nullable();
            $table->string('municipal_trade_licence')->nullable();
            $table->string('leagel_meterology_sales')->nullable();
            $table->date('leagel_meterology_sales_date')->nullable();
            $table->string('leagel_meterology_service')->nullable();
            $table->date('leagel_meterology_service_date')->nullable();
            $table->string('cash_cr_bank')->nullable();
            $table->string('cash_cr_bank_ifsc')->nullable();
            $table->string('cash_cr_acc_no')->nullable();
            $table->string('cur_acc_bank')->nullable();
            $table->string('cur_acc_no')->nullable();
            $table->string('it_crc_ward')->nullable();
            $table->date('acc_start_date')->nullable();
            $table->string('erp_message')->nullable();
            $table->string('tin_no')->nullable();
            $table->date('tin_no_date')->nullable();
            $table->string('po_bank')->nullable();
            $table->string('po_excice_dtl')->nullable();
            $table->string('alias')->nullable();
            $table->date('approved_date')->nullable();
            $table->date('registered_date')->nullable();
            $table->string('company_group')->nullable();
            $table->date('active_from_date')->nullable();
            $table->date('active_to_date')->nullable();
            $table->string('gst_no')->nullable();
            $table->date('gst_date')->nullable();
            $table->string('company_id_no')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->enum('status',['active','inactive', 'blocked']);
            $table->boolean('is_available')->default(0);
            $table->boolean('is_deleted')->default(0);
            $table->boolean('has_access')->default(1);
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
        Schema::dropIfExists('companies');
    }
}
