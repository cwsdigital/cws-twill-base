<nav class="">
    <ul>
        @foreach( $items as $item )
        <li>
            <a href="{{ $item->href }}" class="">{{ $item->title }}</a>
        </li>
        @endforeach
    </ul>
</nav>
