<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet"> <!--load all styles -->
</head>
<body>
    <div id="app">
      
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">

                <h1 class="text-center" style="letter-spacing: 1px; font-family: 'Cookie', cursive; margin-left: 12%">Photogram</h1>

                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav" style="margin-left: 25%">
                            <li><input type="search" name="" id="" placeholder="{{ __('Buscar') }}"></li>
                    </ul> --}}
        
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style=" margin-right: 8%">

                        {{-- icon home --}}
                        <i class="nav-item mr-2">
                            <a class="nav-link fas fa-house-user mt-1" style="font-size: 24px" href="{{ route('home') }}"></a>
                        </i> 

                        {{-- Icon new Post --}}
                        <i class="nav-item mr-2">
                            <a class="nav-link fas fa-camera mt-1" style="font-size: 24px" data-toggle="modal" data-target="#ModalPost"></a>
                        </i> 

                        {{-- Icon notificacions--}}
                        <i class="nav-item mr-2">
                            <a class="nav-link fas fa-heart mt-1" style="font-size: 24px" href="{{ route('home') }}"></a>
                        </i> 

                        {{-- Profile user --}}
                        <i class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}">
                                <img style="width:25px" class="img-fluid rounded-circle" src="{{ asset('storage').'/'.Auth::user()->image }}" alt="profile">
                            </a>
                        </i> 
                    </ul>
                </div>
            </div>
        </nav>  
        
        {{-- Modal for create new post --}}
        @include('post.create')