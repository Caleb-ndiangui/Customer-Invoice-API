<?php

namespace App\Filters\v1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomersFilter extends ApiFilter
{
    protected $safeparams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],
        'postalcode' => ['eq', 'gt', 'lt'],

    ];
    protected $columnmap = [
        'postalcode' => 'postal_code'
    ];
    protected $operatormap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>='

    ];
    public function transform(Request $request)
    {
        $eloQuery = [];
        foreach ($this->safeparams as $param => $operators) {
            $query = $request->query($param);
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnmap[$param] ?? $param;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatormap[$operator], $query[$operator]];
                }
            }
        }
        return $eloQuery;
    }
}
