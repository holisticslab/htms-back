<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    public function index() {
        return Course::with('trainings')->paginate(10);
    }

    public function show($id)
    {
        return Course::find($id);
    }

    public function showName()
    {
        return DB::table('courses')->select('course_name', 'id')->get();
    }

    public function create(Request $request) {

        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_fee' => 'required',
            'course_image' => 'required',
            'max_student' => 'required',
        ]);

        Course::create($request->all());

        return Course::paginate(10); 
    }

    public function update(Request $request, $id) {
        $request->validate([
            'course_name' => 'required',
            'course_desc' => 'required',
            'course_fee' => 'required',
            'course_image' => 'required',
            'max_student' => 'required'
        ]);
    
        $course = Course::find($id);
        $course->course_name = $request->course_name;
        $course->course_desc = $request->course_desc;
        $course->course_fee = $request->course_fee;
        $course->course_image = $request->course_image;
        $course->max_student = $request->max_student;
        $course->save();
        return Course::paginate(10);
    }

    public function destroy($id) 
    {
        $course = Course::find($id);
        $course -> delete();
        return Course::paginate(10);
    }
}
