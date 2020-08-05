<?php

namespace App\Repositories\Behaviours;

use App\Models\Page;
use Illuminate\Support\Facades\DB;

trait HandleNesting {

    public function setNewOrder($ids)
    {
        DB::transaction(function () use ($ids) {
            $this->model::saveTreeFromIds($ids);
        }, 3);
    }
}

