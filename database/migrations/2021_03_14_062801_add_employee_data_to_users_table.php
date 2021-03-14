<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmployeeDataToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('company_id')->after('id')->nullable();
            $table->string('username')->after('password')->nullable();
            $table->string('mac_id')->after('username')->nullable();
            $table->date('last_login_date')->after('username')->nullable();
            $table->integer('status')->after('last_login_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company_id');
            $table->dropColumn('username');
            $table->dropColumn('last_login_date');
            $table->dropColumn('status');
        });
    }
}
