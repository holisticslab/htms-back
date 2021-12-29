<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Company::paginate(10); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $company_name = $request->input('company_name');
        $company_branch = $request->input('company_branch');
        $company_register_no = $request->input('company_register_no');
        $company_type = $request->input('company_type');
        $company_details = $request->input('company_details');

        Company::create([
            'company_branch' => $company_branch,
            'company_name' => $company_name,
            'company_register_no' => $company_register_no,
            'company_type' => $company_type,
            'company_details' => $company_details
        ]);

        return Company::paginate(10);
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Company::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required',
            'company_branch' => 'required',
            'company_register_no' => 'required',
            'company_type' => 'required',
            'company_details' => 'required'
        ]);
    
        $company = Company::find($id);
        $company->update($request->all());
        return Company::paginate(10); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        $company -> delete();
        return Company::paginate(10); 
    }
}
