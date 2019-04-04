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
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
@php
    if(session('themeMode') != null){
    }else{
        session(['themeMode' => 'dark']);
    }
@endphp
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                @if (@session('themeMode') == 'dark')
                    <img src="{{ asset('img/csslogo-white.png') }}" width="40" height="30">  {{ config('app.name', 'Laravel') }} <span class="badge badge-soft-warning">Beta</span>
                    @else
                        @if(@session('themeMode') == 'light')
                            <img src="{{ asset('img/csslogo.png') }}" width="40" height="30">  {{ config('app.name', 'Laravel') }} <span class="badge badge-soft-warning">Beta</span>
                        @else
                            <img src="{{ asset('img/csslogo-white.png') }}" width="40" height="30">  {{ config('app.name', 'Laravel') }} <span class="badge badge-soft-warning">Beta</span>
                        @endif
                 @endif
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav mr-auto">
                        @if (@session('themeMode') == 'dark')
                           <a href="/home/setlightmode"><i class="fas fa-sun"></i> Light mode</a>
                        @else
                            @if(@session('themeMode') == 'light')
                                <a href="/home/setdarkmode"><i class="fas fa-moon"></i> Dark Mode</a>
                            @else
                                <a href="/home/setlightmode"><i class="fas fa-sun"></i> Light mode</a>
                            @endif
                        @endif
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <i class="fas fa-chevron-down"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        
    <div style="margin-top: 100px;"></div>

    <hr>
    <footer class="mt-3">
        <div class="row">
            <div class="col-2">
                @if (@session('themeMode') == 'dark')
                    <img style="max-width: 100%;" src="{{asset('img/cssx-white.png')}}" alt="">
                    @else
                        @if(@session('themeMode') == 'light')
                            <img style="max-width: 100%;" src="{{asset('img/cssx-black.png')}}" alt="">
                        @else
                            <img style="max-width: 100%;" src="{{asset('img/cssx-white.png')}}" alt="">
                        @endif
                 @endif
            </div>
            <div class="col-10">
                <h1>CSS-X Grader</h1>
                <p class="text-muted">&copy; Computer Science Smasta. All rights reserved. source code can be found on this <a href="https://git.io/fjkSD">github</a></p>
                <img src="https://img.shields.io/github/license/itsramaadi/css-grader.svg" alt="LICENSE"> <img src="https://img.shields.io/badge/Laravel-v.5.8.*-red.svg" alt="Laravel-V">
            </div>
        </div>
    </footer>
    </div>
    @yield('scripts')
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/list.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
