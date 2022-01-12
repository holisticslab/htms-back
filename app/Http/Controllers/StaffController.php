<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Staff::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $company_id = $request->input('company_id');
        $staff_name = $request->input('staff_name');
        $staff_email = $request->input('staff_email');
        $staff_phoneno = $request->input('staff_phoneno');
        $staff_ic = $request->input('staff_ic');

        Staff::create([
            'company_id'=> $company_id,
            'staff_name'=> $staff_name,
            'staff_email'=> $staff_email,
            'staff_phoneno'=>$staff_phoneno,
            'staff_ic'=>$staff_ic
        ]);

        return Staff::paginate(10); 
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
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Staff::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'staff_name' => 'required',
            'staff_email' => 'required',
            'staff_ic' => 'required',
            'staff_phoneno' => 'required'
        ]);
    
        $staff = Staff::find($id);
        $staff->update($request->all());
        return Staff::paginate(10); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff -> delete();
        return Staff::paginate(10); 
    }
}
