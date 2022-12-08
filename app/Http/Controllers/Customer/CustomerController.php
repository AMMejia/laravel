<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Customer::all(), 200);
    }

    /**
     * Display one field of the current resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->last_name = $request->last_name;
            $customer->phone = $request->phone;
            $customer->mobile = $request->mobile;
            $customer->save();
            return response()->json($customer, 200);
        } catch (\Exception $exception)
        {
            return response()->json($exception->getMessage(), 203);  
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Customer $customer, Request $request)
    {
        $customer->update($request->all());
        return response()->json($customer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return response()->json('Success', 200);
    }
}
