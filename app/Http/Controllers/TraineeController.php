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
        return Trainee::latest()->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $company_id = DB::table('companies')->where('company_name', $request->input('company_name'))->value('id');
        // $training_id = DB::table('training')->where('training_name', $request->input('training_name'))->value('id');

        $trainee_participate = $request->input('trainee_participate');
        $trainee_name = $request->input('trainee_name');
        $trainee_status = $request->input('trainee_status');
        $trainer_payment = $request->input('trainer_payment');
        $allergies = $request->input('allergies');
        $referrer_code = $request->input('referrer_code');
        $promo_code = $request->input('promo_code');
        $hrdc_status = $request->input('hrdc_status');

        return Training::create([
            'company_id'=> $company_id,
            'training_participate'=> $training_participate,
            'trainee_name'=> $trainee_name,
            'trainee_status'=>$trainee_status,
            'trainer_payment'=>$trainer_payment,
            'allergies'=> $allergies,
            'referrer_code'=> $referrer_code,
            'promo_code' => $promo_code,
            'hrdc_status' => $hrdc_status
        ]);
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
    public function update(Request $request, Trainee $trainee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trainee  $trainee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainee $trainee)
    {
        //
    }
}
