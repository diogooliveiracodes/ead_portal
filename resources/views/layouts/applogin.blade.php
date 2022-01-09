<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Perola</title>

    <!-- Scripts -->
    <script src="{{URL::asset('js/app.js')}}" defer></script>
    {{-- <script src="/js/app.js"></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{URL::asset('css/register.css')}}" rel="stylesheet">


    {{-- fontawsome --}}
    <script src="https://kit.fontawesome.com/9f90449050.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-primary py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/"
                    style="color: #0084ff !important; font-family: Merriweather Sans, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji; font-weight: 700;">
                    <img style="height: 7vh" src="/img/logo_blue.png" alt="">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('welcome') }}"><i class="fas fa-undo-alt"></i> Voltar</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="" style="background-color:rgb(0, 132, 255)">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

<style scoped>
nav{
    box-shadow: 0px 1px 7px #646464;
    background: white;
}
.navbar-brand{
    font-size: 2rem !important;
    color: #212529 !important;
}
.nav-link{
    font-size: 1.2rem !important;
    color: #212529 !important;
}
.nav-link:hover{
    color: #dc3545 !important;
}
</style>

</html>
