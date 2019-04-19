<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>
    <!-- Styles -->
    @if (@session('themeMode') == 'dark')
        <link href="{{ asset('css/app.css?x') }}" rel="stylesheet">
    @else
        @if(@session('themeMode') == 'light')
            <link href="{{ asset('css/app-light.css') }}" rel="stylesheet">
        @else
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @endif
    @endif
    <link href="{{ asset('css/quill.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <main style="height:100vh; width:100%">
        @yield('content')
    </main>
</body>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
