<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            @auth
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/home') }}">Home</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/categories') }}">Categories</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/tags') }}">Tags</a>
                                </li>
                                @if (auth()->user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{ url('/admin/users') }}">Users</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ url('/admin/users/create') }}">New user</a>
                                    </li>
                                @endif
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/users/profile') }}">My profile</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/tags/create') }}">Create tag</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/posts') }}">All Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/posts/trash') }}">All trashed Posts</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/categories/create') }}">Create new category</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ url('/admin/posts/create') }}">Create new post</a>
                                </li>
                                @if (auth()->user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{ url('/admin/settings') }}">Settings</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-lg-8">
                            @yield('content')
                        </div>
                    </div>
                </div>
            @else
                @yield('content')
            @endauth
        </main>
    </div>

    {{-- ---------- Start of Js ---------- --}}
    @yield('js')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    {{-- ---------- End of Js ---------- --}}

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

    @yield('scripts')

</body>
</html>
