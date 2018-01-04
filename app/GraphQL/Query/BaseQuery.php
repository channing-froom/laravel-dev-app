<?php
namespace App\GraphQL\Query;

use Rebing\GraphQL\Support\Query;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseQuery extends Query
{
    /**
     * String reference to the Entity that the query should use to manage data
     * This should be swapped with service layer
     *
     * @var string
     */
    protected $entity;

    /**
     * Define if the response is expected to be a collection or single item
     * Set to false for single items
     *
     * @var bool
     */
    protected $collection = true;

    /**
     * Place holder for generating ORM queries for data collection
     * Var gets populated during construct and can be ignored
     *
     * @var Builder
     */
    protected $ormQuery;

    public function __construct($attributes = [])
    {
        $this->ormQuery = ($this->entity)::query();
        parent::__construct($attributes);
    }

    /**
     * Return the expected Type
     * Create custom GraphQL type or use the Type object definitions.
     * Auto resolves to a list or a single type based on the value of $this->collection.
     *
     * @return GraphQL\Type\Definition\ListOfType
     */
    public function type()
    {
        $type = GraphQL::type($this->type);

        return $this->collection ? Type::listOf($type) : $type;
    }

    /**
     * Over ridden resolve methods that defines the data collection method.
     *
     * @param $root
     * @param $args
     * @param $context
     * @param GraphQL\Type\Definition\ResolveInfo $resolveInfo
     *
     * @return Model|Collection|mixed
     */
    public function resolve($root, $args, $context, GraphQL\Type\Definition\ResolveInfo $resolveInfo)
    {
        if (!empty($args)) {
            return $this->search($root, $args);
        } else {
            return $this->all($root);
        }
    }

    /**
     * Generic search, Query that accepts params
     *
     * @param $root
     * @param $args
     *
     * @return Collection|Model|mixed
     */
    protected function search($root, $args)
    {
        foreach ($args as $key => $value) {
            $this->ormQuery->where($key, $value);
        }

        return $this->collection
            ? $this->ormQuery->get()
            : $this->ormQuery->first();
    }

    /**
     * Generic collect all
     *
     * @param $root
     *
     * @return Collection|mixed
     */
    protected function all($root)
    {
        return ($this->entity)::all();
    }
}