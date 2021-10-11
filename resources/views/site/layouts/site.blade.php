<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" class="no-js">
    @include('site.shared.head')
<body class="" onload="">
    <x-header></x-header>
    <main id="main">
        <x-max-width>
            @yield('content')
        </x-max-width>
    </main>
    <x-footer></x-footer>
    </body>
</html>
