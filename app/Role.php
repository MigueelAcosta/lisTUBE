<?php

namespace lisTUBE;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function users()
    {
        return $this
            ->belongsToMany('lisTUBE\User')
            ->withTimestamps();
    }
}
