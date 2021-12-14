<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() {

        return Course::all();
    }

    public function create(Request $request) {

        $course_name = $request->input('course_name');
        $course_desc = $request->input('course_desc');
        $course_fee = $request->input('course_fee');
        $course_link = $request->input('course_link');
        $max_student = $request->input('max_student');

        return Course::create([
            'course_name'=> $course_name,
            'course_desc'=>$course_desc,
            'course_fee'=>$course_fee,
            'course_link'=> $course_link,
            'max_student'=> $max_student
        ]);
    }

    public function edit(Certificate $certificate)
    {
        //
    }
}
