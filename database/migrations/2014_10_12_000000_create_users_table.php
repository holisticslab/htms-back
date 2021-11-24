<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('ic')->unique();
            $table->string('password');
            $table->string('role');
            $table->string('phone_no');
            $table->string('fullname')->nullable();
            $table->string('ssm_no')->unique()->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_addess')->nullable();
            $table->string('company_type')->nullable();
            $table->string('position')->nullable();
            $table->string('allergies')->nullable();
            $table->string('referrer_code')->nullable();
            $table->string('promo_code')->nullable();
            $table->boolean('hrdf_claim')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
