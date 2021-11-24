<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function GetCourseDetails() {

        $title = $_SERVER['REMOTE_ADDR'];
        $description = $_SERVER['REMOTE_ADDR'];
        $course_fee = $_SERVER['REMOTE_ADDR'];
        $max_student = $_SERVER['REMOTE_ADDR'];

        $result = Course::insert([
            'title' => $title,
            'description' => $title,
            'course_fee' => $title,
            'max_student' => $title
        ]);

        return $result;
    }

    public function PostCourseDetails() {

        // $title = $request->input('title');
        // $description = $request->input('description');
        // $course_fee = $request->input('course_fee');
        // $max_student = $request->input('max_student');

        // $result = Course::insert([
        //     'title' => $title,
        //     'description' => $description,
        //     'course_fee' => $course_fee,
        //     'max_student' => $max_student
        // ]);

        return "test";
    }
}
