<?php
namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class TaxonomyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Taxonomy',
        'description' => '',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Primary key / identifier for table',
            ],
            'slug' => [
                'type' => Type::string(),
                'description' => 'Slug',
            ],
            'label' => [
                'type' => Type::string(),
                'description' => 'Title',
            ],
            'parent' => [
                'type' => Type::int(),
                'description' => 'Parent id - references Taxonomy',
            ],
        ];
    }
}