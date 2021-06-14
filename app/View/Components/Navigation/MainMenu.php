<?php

namespace App\View\Components\Navigation;

use Illuminate\View\Component;

class MainMenu extends Component
{
    public $breakpoint;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breakpoint = '60em')
    {
        $this->breakpoint = $breakpoint;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navigation.main-menu');
    }
}
