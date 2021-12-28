<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Discount::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training_id = $request->input('training_id');
        $discount_value = $request->input('discount_value');
        $discount_code = $request->input('discount_code');
        $discount_desc = $request->input('discount_desc');
        $discount_start_date = $request->input('discount_start_date');
        $discount_end_date = $request->input('discount_end_date');
        $limit_discount = $request->input('limit_discount');

        State::create([
            'training_id' => $training_id,
            'discount_value' => $discount_value,
            'discount_code' => $discount_code,
            'discount_desc' => $discount_desc,
            'discount_start_date' => $discount_start_date,
            'discount_end_date' => $discount_end_date,
            'limit_discount' => $limit_discount,
        ]);

        return State::paginate(10);
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
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'training_id' => 'required',
            'discount_value' => 'required',
            'discount_code' => 'required',
            'discount_desc' => 'required',
            'discount_start_date' => 'required',
            'discount_end_date' => 'required',
            'limit_discount' => 'required',
        ]);
    
        $discount = Discount::find($id);
        $discount->update($request->all());
        return Discount::paginate(10); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::find($id);
        $discount -> delete();
        return Discount::paginate(10); 
    }
}
