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
            $table->increments(column: 'train_id')->unique();
            $table->integer(column: 'course_id')->constrained();
            $table->string(column: 'train_place');
            $table->string(column: 'train_address');
            $table->string(column: 'train_mode');
            $table->date(column: 'train_date_start');
            $table->date(column: 'train_date_end');
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
