<?php

namespace App\Services\V1;
use Illuminate\Http\Request;

class customerQuery
{
    protected $allowedParams = [
        'postcode' => 'eq',
        'type' => 'eq',
        'email' => 'eq',
        'address' => 'eq',
        'city' => 'eq',
        'state' => 'eq',
        'postal_code' => 'eq', 'gt', 'lt',
    ];
    
    protected $columnMap = [
        'postcode' => 'postal_code',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<=',
    ];

}