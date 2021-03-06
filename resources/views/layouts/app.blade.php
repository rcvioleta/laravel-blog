<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
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

        <div class="container">
            <div class="row">

                @if (Auth::check())
                    <div class="col-md-4 py-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{ route('home') }}">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            @if (Auth::user()->admin)
                                <li class="list-group-item">
                                    <a href="{{ route('users') }}">
                                        <i class="fas fa-users"></i> Users
                                    </a>
                                </li>   
                                <li class="list-group-item">
                                    <a href="{{ route('user.create') }}">
                                        <i class="fas fa-user-plus"></i> New users
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('settings') }}">
                                        <i class="fas fa-sliders-h"></i> Settings
                                    </a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{ route('user.profile') }}">
                                    <i class="fas fa-user-edit"></i> Edit my profile
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories') }}">
                                    <i class="fas fa-layer-group"></i> Categories
                                </a>
                            </li>  
                            <li class="list-group-item">
                                <a href="{{ route('posts') }}">
                                    <i class="fas fa-pencil-alt"></i> Posts
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags') }}">
                                    <i class="fas fa-tags"></i> Tags
                                </a>
                            </li>     
                            <li class="list-group-item">
                                <a href="{{ route('post.trashed') }}">
                                    <i class="fas fa-trash-alt"></i> Trashed Posts
                                </a>
                            </li>                       
                            <li class="list-group-item">
                                <a href="{{ route('category.create') }}">
                                    <i class="fas fa-folder-plus"></i> Create new category
                                </a>
                            </li>     
                            <li class="list-group-item">
                                <a href="{{ route('post.create') }}">
                                    <i class="fas fa-file-signature"></i> Create new post
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create') }}">
                                    <i class="fas fa-user-tag"></i> Create new tags
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif

                <div class="col-md-8 py-4">
                    @yield('content')
                </div>
            </div>
        </div>    

        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            toastr.success("{{ Session::get('message') }}")
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif        
    </script>
</body>
</html>
