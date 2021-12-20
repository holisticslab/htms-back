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
        return Training::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $course_id = DB::table('courses')->where('course_name', $request->input('course_name'))->value('id');

        $train_place = $request->input('train_place');
        $train_address = $request->input('train_address');
        $train_date_start = $request->input('train_date_start');
        $train_date_end = $request->input('train_date_end');
        $train_mode = $request->input('train_mode');
        $train_cohort = $request->input('train_cohort');

        return Training::create([
            'course_id'=> $course_id,
            'train_place'=> $train_place,
            'train_address'=>$train_address,
            'train_date_start'=>$train_date_start,
            'train_date_end'=> $train_date_end,
            'train_mode'=> $train_mode,
            'train_cohort' => $train_cohort
        ]);
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
    public function show(Training $training)
    {
        //
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
            'train_place' => 'required',
            'train_address' => 'required',
            'train_date_start' => 'required',
            'train_date_end' => 'required',
            'train_mode' => 'required',
            'train_cohort' => 'required'
        ]);
    
        $training = Training::find($id);
        $training->update($request->all());
        return $training;
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
        return "Successfully Delete";
    }
}
