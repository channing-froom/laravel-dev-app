<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
    protected $table = 'taxonomy';

    public function parent()
    {
        return $this->hasOne(Taxonomy::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Taxonomy::class, 'parent_id', 'id');
    }
}
