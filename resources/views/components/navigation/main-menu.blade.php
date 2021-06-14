@once
    @push('scripts')
        <script src="{{ mix('js/main-menu.js')}}"></script>
    @endpush
@endonce

<nav aria-label="primary"
     class="primary-navigation"
     x-data="mainMenu()"
     x-init="setBreakpoint(); update()"
     x-on:resize.window="update()"
     data-breakpoint="{{ $breakpoint }}"

     >
    <button class="button nav-toggle"
            aria-expanded="false"
            x-bind:aria-expanded="expanded"
            x-on:click=" expanded = !expanded"
            x-show="showToggle"
            x-cloak>

        <div class="lg:hidden"
             aria-labelledby="expand-nav-label"
             x-show="!expanded">
            <x-icon-with-label icon="menu" size="w-5 h-5">
                <span id="expand-nav-label" class="sr-only">Open Menu</span>
            </x-icon-with-label>
        </div>

        <div class="[ lg:hidden ]"
             aria-labelledby="close-nav-label"
             x-show="expanded">
            <x-icon-with-label icon="close" size="w-5 h-5">
                <span id="close-nav-label" class="sr-only">Close Menu</span>
            </x-icon-with-label>
        </div>

    </button>

    <ul class="bg-brand-dark-blue absolute right-0 left-0 z-10  sm:static sm:flex sm:items-center" x-show.transition.origin.top.right="expanded">
        @foreach($items as $item)
            <x-navigation.main-menu-item :item="$item"></x-menu-item>
        @endforeach
    </ul>
</nav>





