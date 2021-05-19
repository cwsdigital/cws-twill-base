<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model {

    public function menu_item()
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function linkable() {
        return $this->morphTo();
    }

}
