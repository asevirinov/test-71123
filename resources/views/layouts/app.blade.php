<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@if (session()->has('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-transition
         x-init="setTimeout(() => show = false, 2000)"
         class="fixed bottom-5 right-5 z-50 flex items-center rounded border-t-4 border-green-300 bg-green-100 py-4 px-10 text-green-800 opacity-95 shadow-lg dark:border-green-800 dark:bg-green-700 dark:text-gray-200"
         role="alert">

        <div class="text-sm font-medium">
            {{ session('success') }}
        </div>
    </div>
@endif

@if (session()->has('error') || $errors->any())
    <div x-data="{ show: true }"
         x-show="show"
         x-transition
         x-init="setTimeout(() => show = false, 2000)"
         class="fixed bottom-5 right-5 z-50 flex items-center rounded border-t-4 border-red-300 bg-red-100 py-4 px-10 text-red-800 opacity-95 shadow-lg dark:border-red-800 dark:bg-red-700 dark:text-gray-200"
         role="alert">

        <div class="text-sm font-medium">
            {{ session('error') ?? 'Что-то пошло не так...' }}
        </div>
    </div>
@endif

</body>
</html>
