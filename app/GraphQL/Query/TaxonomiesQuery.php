<?php

namespace App\GraphQL\Query;

use App\Models\Taxonomy;
use GraphQL\Type\Definition\Type;

class TaxonomiesQuery extends BaseQuery
{
    protected $entity = '\App\Models\Taxonomy';

    protected $type = 'Taxonomy';

    protected $attributes = [
        'name' => 'taxonomy'
    ];

    public function args()
    {
        return [
            'slug' => [
                'name' => 'slug',
                'type' => Type::string()
            ],
            'top' => [
                'name' => 'top',
                'type' => Type::boolean()
            ]
        ];
    }

    protected function search($root, $args)
    {
        if(isset($args['top'])) {
            return $this->ormQuery->whereNull('parent_id')->get();
        }

        return parent::search($root, $args);
    }
}