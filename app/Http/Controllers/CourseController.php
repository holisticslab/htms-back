<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() {

        return Course::latest()->paginate(10);
    }

    public function create(Request $request) {

        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_fee' => 'required',
            'course_link' => 'required',
            'max_student' => 'required',
        ]);

        return Course::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_fee' => 'required',
            'course_link' => 'required',
            'max_student' => 'required'
        ]);
    
        $course = Course::find($id);
        $course->update($request->all());
        return $course;
    }

    public function destroy($id) 
    {
        $course = Course::find($id);
        $course -> delete();
        return "Successfully Delete";
    }
}
