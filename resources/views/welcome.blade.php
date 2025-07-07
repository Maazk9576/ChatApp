<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WhatsChat</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Tailwind CSS (Ensure Tailwind is included in your project) -->
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Assuming you use Laravel Vite --}}
</head>

<body class="bg-white text-gray-800 flex flex-col items-center justify-center min-h-screen p-6 lg:p-8">

    {{-- Header --}}
    <header class="w-full max-w-4xl text-sm mb-6">
        @if (Route::has('login'))
            <nav class="flex justify-end gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-2 border border-gray-300 text-gray-800 hover:bg-gray-100 rounded-md transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-5 py-2 border border-transparent text-gray-800 hover:border-gray-300 hover:bg-gray-100 rounded-md transition">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-5 py-2 border border-gray-300 text-gray-800 hover:bg-gray-100 rounded-md transition">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    {{-- Main Section --}}
    <main
        class="w-full max-w-4xl flex flex-col lg:flex-row items-center justify-between gap-6 bg-gray-50 p-6 rounded-xl shadow-md">

        {{-- Logo --}}
        <div class="w-full max-w-xs lg:max-w-sm mb-6 lg:mb-0">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-auto object-contain">
        </div>

        {{-- Welcome Text --}}
        <div class="text-center lg:text-left">
            <h1 class="text-2xl font-semibold mb-2">Welcome to WhatsChat</h1>
            <p class="text-gray-600 text-sm">A simple and clean chat application powered by Laravel Reverb and Livewire.
            </p>
        </div>
    </main>

</body>

</html>
