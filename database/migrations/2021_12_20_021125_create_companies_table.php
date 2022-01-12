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
            $table->id();
            $table->string(column: 'company_name');
            $table->string(column: 'company_register_no')->nullable();
            $table->string(column: 'company_type')->nullable();
            $table->string(column: 'company_branch')->nullable();
            $table->text(column: 'company_details')->nullable();
            $table->text(column: 'company_address');
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
