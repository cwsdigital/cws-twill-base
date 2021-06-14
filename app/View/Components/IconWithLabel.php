<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IconWithLabel extends Component
{
    public $icon;
    public $size;
    public $stroke;
    public $fill;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($icon, $size = '', $stroke = 'currentColor', $fill = "none")
    {
        $this->icon = $icon;
        $this->size = $size;
        $this->stroke = $stroke;
        $this->fill = $fill;
    }

    public function render()
    {
        return view('components.icon-with-label');
    }
}
