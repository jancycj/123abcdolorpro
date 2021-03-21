<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('employee_code')->nullable();
            $table->string('employee_name')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender',['male', 'female', 'other'])->nullable()->default('male');
            $table->enum('religion',['hindu', 'muslim', 'christian','other'])->nullable()->default('hindu');
            $table->unsignedInteger('martial_status_id')->nullable();
            $table->unsignedInteger('blood_group_id')->nullable();
            $table->unsignedInteger('status_id')->nullable(); 
            $table->string('branch')->nullable(); 
            $table->date('date_of_termination')->nullable();                
            $table->string('place_of_birth')->nullable();               
            $table->text('perm_address_line1')->nullable();
            $table->text('perm_address_line2')->nullable();
            $table->text('perm_address_line3')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->string('pin')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('passport_no')->nullable();
            $table->unsignedInteger('issued_country')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('ifsc_code')->nullable();  
            $table->string('profile_img')->nullable();
            $table->unsignedInteger('class_id')->nullable();
            $table->unsignedInteger('designation_id')->nullable();
            $table->unsignedInteger('department_id')->nullable();
            $table->unsignedInteger('section_id')->nullable();
            $table->string('emp_catagory')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->date('date_of_retirement')->nullable();
            $table->date('date_of_confirmation')->nullable();
            $table->string('esi_yn')->nullable();
            $table->string('pf_yn')->nullable();
            $table->double('basic_pay',8,2)->nullable();
            $table->double('spl_pay',8,2)->nullable();
            $table->double('da',8,2)->nullable();
            $table->double('hra',8,2)->nullable();
            $table->double('special_allowance',8,2)->nullable();
            $table->double('conveyance_allowance',8,2)->nullable();
            $table->double('food_allowance',8,2)->nullable();
            $table->double('cf',8,2)->nullable();
            $table->double('bf',8,2)->nullable();  
            $table->unsignedInteger('created_by')->nullable();
            $table->boolean('is_available')->nullable()->default(0);
            $table->boolean('is_deleted')->nullable()->default(0);
            $table->boolean('has_access')->nullable()->default(1);
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
        Schema::dropIfExists('employees');
    }
}
