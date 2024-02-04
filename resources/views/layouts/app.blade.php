<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('img/faviconmilla.ico')}}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="background-color: #F0E8E1;">
    <div id="app">

        @component('components.menu')
        @endcomponent
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <hr>
    <footer class="footer" style="position: sticky;bottom: 0;width: 100%;">
        <div class="container">
            <span class="text-muted text-center"> Todos los derechos reservados © GrupoMilla 2023</span>
        </div>
    </footer>
</body>
@yield('scripts')
</html>
