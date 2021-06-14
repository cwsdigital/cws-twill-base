<li class="px-sm py-xs">
    <a  href="{{ $item->href }}"
        class="block
               no-underline
               {{ request()->is(str_replace('/','',$item->href . '*')) ? '' :'' }}"
        >
        {{ $item->title }}
    </a>
</li>
