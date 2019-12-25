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
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('employee_code')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->unsignedInteger('state_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->date('dob')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->text('address_line1')->nullable();
            $table->text('address_line2')->nullable();
            $table->text('address_line3')->nullable();
            $table->text('post_code')->nullable();
            $table->text('place')->nullable();
            $table->enum('gender',['male', 'female', 'other']);
            $table->string('mobile_prefix')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('phone_prefix')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('passport_no')->nullable();
            $table->unsignedInteger('issued_country')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('profile_img')->nullable();
            $table->unsignedInteger('created_by')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
