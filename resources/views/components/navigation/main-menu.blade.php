<nav aria-label="primary"
     class="primary-navigation"
     x-data="mainMenu()"
     x-init="setBreakpoint(); update()"
     x-on:resize.window.debounce.10ms="update()"
     data-breakpoint="{{ $breakpoint }}"

     >
    <button class="button nav-toggle"
            aria-expanded="false"
            x-bind:aria-expanded="isDesktop"
            x-on:click="isOpen = !isOpen"
            x-show="!isDesktop"
            x-cloak>

        <div class="lg:hidden"
             aria-labelledby="expand-nav-label"
             x-show="!isOpen">
            <x-icon-with-label icon="menu" size="w-5 h-5">
                <span id="expand-nav-label" class="sr-only">Open Menu</span>
            </x-icon-with-label>
        </div>

        <div class="[ lg:hidden ]"
             aria-labelledby="close-nav-label"
             x-show="isOpen">
            <x-icon-with-label icon="close" size="w-5 h-5">
                <span id="close-nav-label" class="sr-only">Close Menu</span>
            </x-icon-with-label>
        </div>

    </button>

    <ul class="bg-brand-dark-blue absolute right-0 left-0 z-10  my-0 sm:static sm:flex sm:items-center" x-show.transition.origin.top.right="isDesktop || isOpen">
        @foreach($items as $item)
            <x-navigation.main-menu-item :item="$item"></x-menu-item>
        @endforeach
    </ul>
</nav>





