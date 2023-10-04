@php
    use App\Models\System;
    
    $systems = System::get();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Rafaelle System') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/logo1.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex lg:text-center md:justify-center text-center">
                <h1 class="lg:text-7xl font-bold text-green-600 md:text-6xl text-3xl">RAFAELLE GATEWAY SYSTEM</h1>
            </div>

            <div class="mt-16 ">
                <div class="grid w-full gap-6 md:grid-cols-2 justify-center">
                    @foreach ($systems as $system)
                        <div class="text-center max-w-sm p-6">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-green-600">
                                {{ strtoupper($system->system_name) }}</h5>
                            <div class="flex justify-center">
                                <x-application-logo
                                    src="{{ $system->logo ? asset('storage/' . $system->logo) : asset('img/logo1.png') }}"
                                    width="200" class="text-center"></x-application-logo>
                            </div>

                            <a href="{{ $system->system_url }}"
                                class="inline-flex items-center px-3 py-2 mt-3 text-sm font-medium text-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                {{ $system->publish ? 'SIGN IN' : 'COMING SOON!' }}
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</body>

</html>
