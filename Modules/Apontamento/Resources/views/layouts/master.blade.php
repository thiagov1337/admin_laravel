<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Apontamento' }}</title>

        {{-- Laravel Vite - CSS File --}}
        @vite(['resources/sass/app.scss', 'resources/js/bootstrap.js'])
        @vite(['Modules/Apontamento/Resources/assets/js/app.js'])

{{--        {{ module_vite('build-apontamento', 'Resources/assets/js/app.js') }}--}}

    </head>
    <body>
    <div class="container-fluid">
        @yield('content')
    </div>

    {{-- Laravel Vite - JS File --}}
    {{-- {{ module_vite('build-apontamento', 'Resources/assets/js/app.js') }} --}}
    </body>
</html>
