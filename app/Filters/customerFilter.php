<?php

namespace App\Filters;

use Illuminate\Http\Request;

class CustomerFilter
{
    protected $allowedParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];
    
    public function transform(Request $request): array
    {
        $eloquery = [];

        foreach ($this->allowedParams as $param => $operators) {
            $query = $request->query($param);

            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$param] ?? $param;

            // Support syntax like ?postalCode[gt]=3000
            if (is_array($query)) {
                foreach ($query as $operator => $value) {
                    if (!in_array($operator, $operators)) {
                        continue;
                    }

                    $eloquery[] = [
                        $column,
                        $this->operatorMap[$operator],
                        $value
                    ];
                }
            } else {
                // Default eq: ?city=Nairobi
                $eloquery[] = [
                    $column,
                    '=',
                    $query
                ];
            }
        }

        return $eloquery;
    }
}
