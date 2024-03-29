<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'course_name');
            $table->text(column: 'course_desc')->nullable();
            $table->integer(column: 'course_fee');
            $table->text(column: 'course_image');
            $table->string(column: 'max_student')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
