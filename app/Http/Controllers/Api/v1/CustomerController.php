<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Filters\v1\CustomersFilter;
use App\Http\Controllers\Controller;

use App\Http\Resources\v1\CustomerResource;

use App\Http\Resources\v1\CustomerCollection;
use App\Http\Requests\v1\StorecustomerRequest;
use App\Http\Requests\v1\UpdatecustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $filter = new CustomersFilter();
    $FilterItems = $filter->transform($request);
    $includeinvoices = $request -> query('includeInvoices');

    $customers =customer::where($FilterItems);
    if($includeinvoices){
        $customers = $customers -> with('invoice') ;
    }

    return new CustomerCollection($customers->paginate()->appends($request->query()));

}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecustomerRequest $request)
    {
        return new CustomerResource(customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecustomerRequest $request, customer $customer)
    {
        $customer -> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        //
    }
}
