<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trainee::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        // $company_id = DB::table('companies')->where('company_name', $request->input('company_name'))->value('id');
        // $cohort_id = DB::table('cohort')->where('cohort_name', $request->input('cohort_name'))->value('id');

        $company_id = $request->input('company_id');
        $cohort_id = $request->input('cohort_id');
        $trainee_name = $request->input('trainee_name');
        $trainee_ic = $request->input('trainee_ic');
        $trainee_email = $request->input('trainee_email');
        $trainee_phoneno = $request->input('trainee_phoneno');
        $trainee_status = $request->input('trainee_status');
        $trainee_payment = $request->input('trainee_payment');
        $allergies = $request->input('allergies');
        $referrer_code = $request->input('referrer_code');
        $promo_code = $request->input('promo_code');
        $hrdc_status = $request->input('hrdc_status');

        Trainee::create([
            'company_id'=> $company_id,
            'cohort_id'=> $cohort_id,
            'trainee_name'=> $trainee_name,
            'trainee_ic'=> $trainee_ic,
            'trainee_email'=> $trainee_email,
            'trainee_phoneno'=> $trainee_phoneno,
            'trainee_status'=>$trainee_status,
            'trainee_payment'=>$trainee_payment,
            'allergies'=> $allergies,
            'referrer_code'=> $referrer_code,
            'promo_code' => $promo_code,
            'hrdc_status' => $hrdc_status
        ]);

        return DB::table('trainees')->where('cohort_id', $cohort_id)->paginate(10);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function show(Trainee $trainee)
    {
        //
    }

    public function showName($id)
    {
        return DB::table('trainees')->where('cohort_id', $id)->get();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainee $trainee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'trainee_name' => 'required',
            'trainee_ic' => 'required',
            'trainee_email' => 'required',
            'trainee_phoneno' => 'required',
        ]);
    
        $trainee = Trainee::find($id);
        $trainee->update($request->all());
        return Trainee::paginate(10); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        $trainee = Trainee::find($id);
        $trainee -> delete();
        return Trainee::paginate(10); 
    }
}
