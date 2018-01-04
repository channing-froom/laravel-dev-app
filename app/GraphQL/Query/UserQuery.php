<?php
namespace App\GraphQL\Query;

use GraphQL;

class UserQuery extends UsersQuery
{
    protected $collection = false;

    public function resolve($root, $args, $context, GraphQL\Type\Definition\ResolveInfo $resolveInfo)
    {
        // forcing a value for the users id
        $args['id'] = 1;

        return parent::resolve($root, $args, $context, $resolveInfo);
    }
}