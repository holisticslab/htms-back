<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->nullable()->default(null)->onDelete('cascade');
            $table->string(column: 'train_name');
            $table->string(column: 'train_place');
            $table->string(column: 'train_state');
            $table->string(column: 'train_address');
            $table->string(column: 'train_mode');
            $table->text(column: 'train_desc')->nullable();
            $table->text(column: 'train_include')->nullable();
            $table->string(column: 'total_trainee')->nullable();
            $table->date(column: 'train_date_start');
            $table->date(column: 'train_date_end');
            $table->string(column: 'train_cohort')->nullable();
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
        Schema::dropIfExists('trainings');
    }
}
