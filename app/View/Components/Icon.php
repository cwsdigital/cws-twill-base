<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Icon extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.icon');
    }
}
