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
            $table->foreignId('company_id')->constrained('companies');
            $table->text(column: 'trainee_name')->nullable();
            $table->text('training_participate')->nullable();
            $table->string(column: 'trainee_status')->nullable();
            $table->string(column: 'trainer_payment')->nullable();
            $table->string(column: 'allergies')->nullable();
            $table->string(column: 'referrer_code')->nullable();
            $table->string(column: 'promo_code')->nullable();
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