<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100">

    <!-- Top navbar -->
    <header class="w-full bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="flex items-center gap-2">
                <x-application-logo class="w-10 h-10 text-blue-600" />
                <span class="text-xl font-semibold">Dashboard</span>
            </a>
        </div>
    </header>

    <!-- Page content -->
    <main class="max-w-7xl mx-auto w-full px-6 py-10">
        <div class="bg-white shadow rounded-xl p-8">
            {{ $slot }}
        </div>
    </main>

</body>

</html>
