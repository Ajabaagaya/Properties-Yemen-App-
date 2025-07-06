<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}">
        <link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.js')}}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        rel="stylesheet" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"/>
        
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Styles -->
        @stack("styles")
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        
        <x-banner />
        
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')
            
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            @yield('content')
            
            <!-- Page Content -->
            <main>
                {{ $slot ?? '' }}
            </main>
        </div>
        @stack('modals')
        
        
        @stack("scripts")
        @livewireScripts
        
    </body>
</html>
