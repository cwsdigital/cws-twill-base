{{--
    The ordering in the head here is based off best practices / research by Harry Roberts @csswizardry
    https://speakerdeck.com/csswizardry/get-your-head-straight
    Summary:
    1) Meta Charset
    2) Title
    3) Preconnect tags
    4) Async scripts (analytics, etc)
    5) CSS that includes @import [ but just don't use @import ]
    6) Synchronous JS
    7) Synchronous CSS
    8) Preload
    9) Defered JS
    10) Prefetch / Prerender
    11) Everything else  ( SEO, Meta, Icons Opengraph etc)
--}}

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    {!! SEO::generateTitle() !!}
    {{--  --}}
    @stack('preconnects')

    @include('site.shared.ga')
    @stack('asyncScripts')

    <script>
        document.documentElement.classList.remove('no-js');
    </script>

    @stack('scripts')

    <link rel="stylesheet" href="{{mix('css/app.css')}}"/>
    @stack('styles');

    <script type="module" src="{{mix('js/alpine.min.js')}}" defer></script>

    @stack('deferredScripts')

    {{-- Prefetch / Prerender --}}

    {{-- End Prefetch --}}

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}

</head>
<body class="" onload="">
    <x-header></x-header>
    <main id="main">
        @yield('content')
    </main>
    <x-footer></x-footer>
</body>
</html>
