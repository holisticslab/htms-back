<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Training::paginate(10); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $course_id = DB::table('courses')->where('course_name', $request->input('course_name'))->value('id');

        $course_id = $request->input('course_id');
        $train_name = $request->input('train_name');
        $train_place = $request->input('train_place');
        $train_address = $request->input('train_address');
        $train_state = $request->input('train_state');
        $train_desc = $request->input('train_desc');
        $train_date_start = $request->input('train_date_start');
        $train_date_end = $request->input('train_date_end');
        $train_mode = $request->input('train_mode');
        $train_cohort = $request->input('train_cohort');

        Training::create([
            'course_id'=> $course_id,
            'train_name'=> $train_name,
            'train_place'=> $train_place,
            'train_address'=>$train_address,
            'train_state'=>$train_state,
            'train_desc'=>$train_desc,
            'train_date_start'=>$train_date_start,
            'train_date_end'=> $train_date_end,
            'train_mode'=> $train_mode,
            'train_cohort' => $train_cohort
        ]);

        return Training::paginate(10); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Training::find($id);
    }

    public function showName()
    {
        return DB::table('trainings')->select('train_name', 'id')->get();
    }

    public function showDateTrainingName()
    {
        return DB::table('trainings')->select('train_name', 'train_date_start', 'train_date_end')->get();
    }

    public function showTrainingByCourseID($id)
    {
        return DB::table('trainings')->where('course_id', $id)->get();
    }

    public function showTrainingByYear($year)
    {
        return DB::table('trainings')->whereYear('train_date_start', $year)->get();
    }

    public function getTotalTrainee($id) 
    {
        return DB::table('trainees')->where('training_id', $id)-get()->count();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'train_name' => 'required',
            'train_place' => 'required',
            'train_address' => 'required',
            'train_date_start' => 'required',
            'train_date_end' => 'required',
            'train_mode' => 'required',
        ]);
    
        $training = Training::find($id);
        $training->update($request->all());
        return Training::paginate(10); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        $training -> delete();
        return Training::paginate(10); 
    }
}
