{{--
    The ordering in the head here is based off best practices / research by Harry Roberts @csswizardry
    https://speakerdeck.com/csswizardry/get-your-head-straight
    Summary:
    1) Meta Charset
    2) Title (Unfortunatele we can't quite do this, as the SEO package generates tags together)
    3) Preconnect tags
    4) Async scripts (analytics, etc)
    5) CSS that includes @import [ but just don't use @import ]
    6) Synchronous JS (JS will block CSS, and will stop render - even if we have css, paint/render won't happen until all JS is parsed)
    7) Synchronous CSS (in-flight CSS blocks JS parsing)
    8) Preload
    9) Defered JS
    10) Prefetch / Prerender
    11) Everything else  ( SEO, Meta, Icons Opengraph etc)
--}}

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    {!! SEOMeta::generate() !!}
    @stack('preconnects')

    @include('site.shared.ga')
    @stack('asyncScripts')

    <script>
        document.documentElement.classList.remove('no-js');
    </script>

    @stack('scripts')

    <link rel="stylesheet" href="{{mix('css/app.css')}}"/>
    @stack('styles')

    <script src="{{mix('js/app.js')}}" defer></script>

    @stack('deferredScripts')

    {{-- Prefetch / Prerender --}}

    {{-- End Prefetch --}}

    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
</head>
