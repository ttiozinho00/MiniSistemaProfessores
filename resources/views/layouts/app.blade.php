<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ showLogoutButton: false }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])

</head>
<body class="antialiased">
    <div id="app" class="grid grid-rows-[auto,1fr] min-h-screen">
        <!-- Header -->
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto flex items-center justify-between p-4">
                <a class="text-lg font-bold" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="lg:hidden">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="hidden lg:flex space-x-4">
                    <!-- Navigation Links -->
                    <ul class="flex items-center space-x-4">
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <!-- User Dropdown -->
                            <li class="relative">
                                <button id="navbarDropdown" class="nav-link">
                                    {{ Auth::user()->name }}
                                </button>

                                <div class="dropdown-menu absolute right-0 mt-2 bg-white border border-gray-200 rounded shadow-md hidden">
                                    <a class="dropdown-item block px-4 py-2" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>

    @filamentScripts
    @vite('resources/js/app.js')
</body>
</html>
