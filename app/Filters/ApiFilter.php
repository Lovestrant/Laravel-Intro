<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $allowedParams = [
        'type'       => ['eq'],
        'email'      => ['eq'],
        'address'    => ['eq'],
        'city'       => ['eq'],
        'state'      => ['eq'],
        'postal_code' => ['eq', 'gt', 'lt'],
    ];

    protected $columnMap = [
        'post_code' => 'postalCode',
    ];

    protected $operatorMap = [
        'eq'  => '=',
        'gt'  => '>',
        'lt'  => '<',
        'gte' => '>=',
        'lte' => '<=',
    ];

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
