<?php
namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'User type object',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Primary key / identifier for table',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Users name',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'Users email',
            ],
        ];
    }
}