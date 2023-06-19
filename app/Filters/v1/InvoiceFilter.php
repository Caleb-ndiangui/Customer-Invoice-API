<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class InvoiceFilter extends ApiFilter


{
    protected $safeparams = [
        'customerid' => ['eq'],
        'amount' => ['eq','lt','gt','lte','gte'],
        'status' => ['eq','ne'],
        'billedDate' => ['eq','lt','gt','lte','gte'],
        'paidDate' => ['eq','lt','gt','lte','gte'],


    ];
    protected $columnmap = [
        'billedDate' => 'billed_dated',
        'customerid' => 'customer_id',
        'paidDate' => 'paid_dated'
    ];
    protected $operatormap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='

    ];
    
}
