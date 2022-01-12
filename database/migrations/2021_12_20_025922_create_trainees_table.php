<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainees', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('company_id')->constrained('companies');
            $table->foreignId('company_id');
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');
            $table->text(column: 'trainee_name');
            $table->string(column: 'trainee_ic');
            $table->string(column: 'trainee_email');
            $table->string(column: 'trainee_phoneno');
            // $table->text(column: 'training_participate');
            $table->string(column: 'trainee_status')->nullable()->default('Active');
            $table->string(column: 'trainee_payment')->nullable()->default('');
            $table->string(column: 'allergies')->nullable();
            $table->string(column: 'referrer_code')->nullable()->default('No');
            $table->string(column: 'promo_code')->nullable()->default('No');
            $table->string(column: 'hrdc_status')->nullable();
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
        Schema::dropIfExists('trainees');
    }
}
