<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Portal Marispan</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="http://interno.marispan.com/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="http://interno.marispan.com/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="http://interno.marispan.com/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="http://interno.marispan.com/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="http://interno.marispan.com/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite([
        'resources/sass/app.scss',
        'resources/css/style.css', 
        'resources/js/app.js', 
        'resources/js/main.js'
        ])
</head>

<body>
    <div id="app">

        @include('layouts.home.components.navbar')

        @include('layouts.home.components.hero')

        <main id="main">
            @yield('content')
        </main>
    </div>
</body>

</html>
