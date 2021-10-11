<?php

namespace App\View\Composers;

use App\Twill\Capsules\Menus\Models\Menu;
use Illuminate\View\View;

class FooterMenuComposer
{
    protected $menu;
    protected $items = [];

    public function __construct()
    {
        $this->menu = Menu::visible()
            ->published()
            ->forSlug('footer-menu')
            ->with(['menu_items' => function ($query) {
                $query->orderBy('position', 'asc');
            }])
            ->first();
        if ($this->menu) {
            $this->items = $this->menu->menu_items;
        }
    }

    public function compose(View $view)
    {
        $view->with('items', $this->items->all());
    }
}
