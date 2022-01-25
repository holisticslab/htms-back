<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cohort::with('trainees')->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $course_id = $request->input('course_id');
        $cohort_name = $request->input('cohort_name');
        $cohort_place = $request->input('cohort_place');
        $cohort_address = $request->input('cohort_address');
        $cohort_state = $request->input('cohort_state');
        $cohort_desc = $request->input('cohort_desc');
        $cohort_date_start = $request->input('cohort_date_start');
        $cohort_date_end = $request->input('cohort_date_end');
        $cohort_mode = $request->input('cohort_mode');
        $cohort_include = $request->input('cohort_include');
        $cohort_cohort = $request->input('cohort_cohort');

        Cohort::create([
            'course_id'=> $course_id,
            'cohort_name'=> $cohort_name,
            'cohort_place'=> $cohort_place,
            'cohort_address'=> $cohort_address,
            'cohort_state'=> $cohort_state,
            'cohort_desc'=> $cohort_desc,
            'cohort_date_start'=> $cohort_date_start,
            'cohort_date_end'=> $cohort_date_end,
            'cohort_mode'=> $cohort_mode,
            'cohort_include'=> $cohort_include,
            'cohort_cohort'=> $cohort_cohort
        ]);

        return Cohort::with('trainees')->paginate(10); 
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
     * @param  \App\Models\Cohort  $cohort
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cohort::find($id);
    }

    public function showName()
    {
        return DB::table('cohorts')->select('cohort_name', 'id')->get();
    }

    public function showDateCohortName()
    {
        return DB::table('cohorts')->select('cohort_name', 'cohort_date_start', 'cohort_date_end')->get();
    }

    public function showCohortByCourseID($id)
    {
        return DB::table('cohorts')->where('course_id', $id)->get();
    }

    public function showCohortByYear($year)
    {
        return DB::table('cohorts')->whereYear('cohort_date_start', $year)->get();
    }

    public function getTotalTrainee($id) 
    {
        return DB::table('trainees')->where('cohort_id', $id)-get()->count();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cohort  $cohort
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cohort_name' => 'required',
            'cohort_place' => 'required',
            'cohort_address' => 'required',
            'cohort_date_start' => 'required',
            'cohort_date_end' => 'required',
            'cohort_mode' => 'required',
        ]);
    
        $cohort = Cohort::find($id);
        $cohort->update($request->all());
        return Cohort::with('trainees')->paginate(10); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cohort  $cohort
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cohort = Cohort::find($id);
        $cohort -> delete();
        return Cohort::with('trainees')->paginate(10); 
    }
}
