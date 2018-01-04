<?php

namespace App\GraphQL\Query;

use App\Models\Taxonomy;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;


class TaxonomyQuery extends Query
{
    protected $attributes = [
        'name' => 'taxonomy'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Taxonomy'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'slug' => [
                'name' => 'slug',
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (!empty($args)) {

            $ormObject = null;

            foreach ($args as $key => $value) {
                if (!$ormObject) {
                    $ormObject = Taxonomy::where($key, $value);
                    continue;
                }
                $ormObject->where($key, $value);
            }

            return $ormObject->get();
        } else {
            return Taxonomy::all();
        }
    }
}