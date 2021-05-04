<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Voting') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-50 text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="/">
                <img src="{{ asset("images/logo.svg") }}" alt="logo" />
            </a>
            <div class="mt-2 md:mt-0 flex items-center">
                @if (Route::has('login'))
                <div class="px-6 py-4">
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                        </a>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?d=mp" class="h-10 w-10 rounded-full" /></div>
        </header>

        <main class="container mx-auto max-w-6xl flex flex-col md:flex-row">
            <!-- Add an idea sidebar -->
            <div class="md:w-3/12 mx-auto md:mr-5">
                <div class="bg-white md:sticky md:top-8 border-2 border-blue-500 rounded-xl mt-16">
                    <div class="text-center px-6 py-2 pt-6">
                        <h3 class="font-semibold text-base">Add an idea</h3>
                        <p class="text-xs mt-4">
                            @auth
                                Let us know what you would like and we'll take a look.
                            @else
                                Please log in to create an idea.
                            @endauth
                        </p>
                    </div>
                    @auth
                        <livewire:create-idea />
                    @else
                        <div class="my-6 text-center">
                            <a 
                                href="{{ route('login') }}"
                                class="inline-block justify-center w-1/2 h-11 text-xs bg-blue-500 font-semibold rounded-xl border border-blue-500 hover:bg-blue-700 transition duration-150 ease-in px-6 py-3 text-white">
                                Log In
                            </a>
                            <a 
                                href="{{ route('register') }}" 
                                class="mt-2 inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                                    Sign Up
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
            <!-- Main -->
            <div class="w-full px-2 md:px-0 md:w-8/12">
                <livewire:status-filters />

                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>
            <!-- extra div to push over the design -->
            <div class="w-1/12 invisible"></div>
        </main>

        @livewireScripts
    </body>
</html>
