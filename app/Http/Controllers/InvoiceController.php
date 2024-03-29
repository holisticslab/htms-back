<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Invoice::with('company', 'cohort')->paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $invoice_num = $request->input('invoice_num');
        $invoice_date = $request->input('invoice_date');
        $invoice_due = $request->input('invoice_due');
        $invoice_amount = $request->input('invoice_amount');
        $cohort_id = $request->input('cohort_id');
        $company_id = $request->input('company_id');

        Invoice::create([
            'invoice_num'=> $invoice_num,
            'invoice_date'=> $invoice_date,
            'invoice_due'=> $invoice_due,
            'invoice_amount'=> $invoice_amount,
            'cohort_id'=> $cohort_id,
            'company_id'=> $company_id,
        ]);

        return Invoice::with('company', 'cohort')->paginate(10);
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
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Invoice::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'invoice_num'=> $invoice_num,
            'invoice_date'=> $invoice_date,
            'invoice_due'=> $invoice_due,
            'invoice_amount'=> $invoice_amount,
        ]);
    
        $invoice = Invoice::find($id);
        $invoice->update($request->all());
        return Invoice::paginate(10);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice -> delete();
        return Invoice::paginate(10); 
    }
}
