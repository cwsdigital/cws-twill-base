<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" class="no-js">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('site.shared.ga')

    <script>
        document.documentElement.classList.remove('no-js');
    </script>

    <script type="module" src="{{mix('js/alpine.min.js')}}"></script>
    <script type="nomodule" src="{{mix('js/alpine-ie11.min.js')}}" defer></script>

    @stack('scripts')

    <link rel="stylesheet" href="{{mix('css/app.css')}}"/>

    {!! SEO::generate() !!}

</head>
<body class="" onload="">
    @include('site.partials.header')
    <main id="main">
        @yield('content')
    </main>
    @include('site.partials.footer')
</body>
</html>
