<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\invoice;
use Illuminate\Http\Request;

use App\Filters\v1\InvoiceFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreinvoiceRequest;
use App\Http\Resources\v1\InvoiceResource;
use App\Http\Requests\UpdateinvoiceRequest;
use App\Http\Resources\v1\InvoiceCollection;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new InvoiceFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return new InvoiceCollection(invoice::paginate());
        } else {
            $invoices =invoice::where($queryItems)->paginate();
        return new InvoiceCollection($invoices->appends($request->query()));
    }
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
    public function store(StoreinvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateinvoiceRequest $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}
