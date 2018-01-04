<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;

class TaxonomyQuery extends TaxonomiesQuery
{
    protected $collection = false;

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ]
        ];
    }
}