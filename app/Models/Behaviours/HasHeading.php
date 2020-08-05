<?php

namespace App\Models\Behaviours;

Trait HasHeading {

    public function getHeadingAttribute($value) {
        if( $value ) {
            return $value;
        } else {
            return $this->title;
        }
    }
}
