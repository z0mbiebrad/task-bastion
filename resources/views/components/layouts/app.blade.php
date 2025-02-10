<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            /* Smooth transition */
            * { transition: background-color 0.3s, color 0.3s; }
        </style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body 
        x-data="{ 
            darkMode: localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches) 
        }" 
        x-init="$watch('darkMode', val => localStorage.theme = val ? 'dark' : 'light')" 
        :class="{ 'dark': darkMode }"
        class="font-sans antialiased bg-white dark:bg-black"
    >

        <!-- Page Content -->
        <main class="min-h-screen">
            <livewire:navigation/>
            <livewire:task-create />


            {{ $slot }}
        </main>
    </body>
</html>
