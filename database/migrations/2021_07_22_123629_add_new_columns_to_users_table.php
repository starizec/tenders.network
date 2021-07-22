<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('partner_id')->after('id');
            $table->string('last_name')->after('first_name')->nullable();
            $table->string('telephone')->after('email_verified_at')->nullable();
            $table->string('role')->after('password')->default('user');
            $table->integer('company_id')->after('role')->nullable();
            $table->string('user_status')->after('company_id')->default('active');
            $table->integer('created_by')->after('user_status');
            $table->integer('updated_by')->after('created_by');
            $table->text('filter')->after('user_status');
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
            //
        });
    }
}
