<svg xmlns="http://www.w3.org/2000/svg"
     class="icon {{ $size ?? ''}}"
     viewBox="0 0 24 24"
     stroke-width="1.5"
     stroke="{{ $stroke }}"
     fill="{{ $fill }}"
     stroke-linecap="round"
     stroke-linejoin="round">
        @include( "svg.".$icon )
</svg>
