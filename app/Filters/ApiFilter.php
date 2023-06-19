<?php

namespace App\Filters;

use Illuminate\Http\Request;

class  ApiFilter
{
    protected $safeparams = [ ];
    protected $columnmap = [];
    protected $operatormap = [];

    
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
