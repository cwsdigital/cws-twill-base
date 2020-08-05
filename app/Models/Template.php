<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function scopeForClient($query) {
        return $query->where('admin_only', 0);
    }


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('position', 'asc');
        });
    }
}
