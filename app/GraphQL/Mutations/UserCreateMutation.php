<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use App\Models\User;

class UserCreateMutation extends Mutation {

    protected $attributes = [
        'name' => 'UserCreate'
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'name' => [
                'name' => 'name',
                'description' => 'Users full name',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'name' => 'email',
                'description' => 'Users email',
                'type' => Type::nonNull(Type::string())
            ],
            'password' => [
                'name' => 'password',
                'description' => 'Users password',
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $user = new User($args);
        $user->password = bcrypt($args['password']);
        $user->save();

        return $user;
    }

}