<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCohortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cohorts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->string(column: 'cohort_name');
            $table->string(column: 'cohort_place');
            $table->string(column: 'cohort_state');
            $table->string(column: 'cohort_address');
            $table->string(column: 'cohort_mode');
            $table->text(column: 'cohort_desc')->nullable();
            $table->text(column: 'cohort_include')->nullable();
            $table->string(column: 'total_trainee')->nullable();
            $table->date(column: 'cohort_date_start');
            $table->date(column: 'cohort_date_end');
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
        Schema::dropIfExists('cohorts');
    }
}
