<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/adminkit.scss', 'resources/js/adminkit.js', 'resources/js/chart.js'])

</head>

<body>
    <div class="wrapper">
        
        {{-- sidebar here --}}
        @include('layouts.admin.components.sidebar')

        <div class="main">
            
            {{-- Navbar here --}}
            @include('layouts.admin.components.navbar')
            

            <main class="content">
                <div class="container-fluid p-0">

                    {{-- Content here --}}
                    @yield('content')
                    
                </div>
            </main>

            {{-- Footer here --}}
            @include('layouts.admin.components.footer')

        </div>
    </div>
</body>

</html>
