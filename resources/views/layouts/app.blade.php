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
    <script src="/js/app.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/css/app.css"> --}}
    <link rel="stylesheet" href="/css/navbar.css">
    <link href="/css/nucleo.css" rel="stylesheet">

    {{-- fontawsome --}}
    <script src="https://kit.fontawesome.com/9f90449050.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

<style scoped>
    .nav-item:hover{
        color: red;
    }
</style>

</html>
