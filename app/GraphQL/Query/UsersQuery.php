<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;

class UsersQuery extends BaseQuery
{
    protected $entity = '\App\Models\User';

    protected $type = 'User';

    protected $attributes = [
        'name' => 'user'
    ];

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string()
            ],
        ];
    }
}