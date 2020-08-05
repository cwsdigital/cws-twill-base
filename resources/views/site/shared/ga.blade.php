@if(\Illuminate\Support\Facades\App::environment() == 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168118772-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '');
    </script>
@endif
@if(in_array(\Illuminate\Support\Facades\App::environment(), ['staging']))
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-168118772-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '');
    </script>
@endif
