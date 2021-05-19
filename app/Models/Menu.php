<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasSlug;
use A17\Twill\Models\Model;

class Menu extends Model
{
    use HasSlug;

    protected $fillable = [
        'published',
        'title',
    ];

    public $slugAttributes = [
        'title',
    ];

    public function menu_items()
    {
        return $this->hasMany(MenuItem::class);
    }

    // Menus are considered published by default
    public function getPublishedAttribute()
    {
        return true;
    }

    // Published by default, so remove any possibility of controlling the publish status
    public function getCanPublishAttribute()
    {
        return false;
    }
}
