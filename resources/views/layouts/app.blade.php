<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ellixus') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
            [x-cloak] {
                display: none;
            }
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="antialiased" 
        x-data="{'darkMode': false}" 
        x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">
        <div :class="{'dark': darkMode === true}" x-data="{nav_open: false}" x-cloak>
            <div class="relative lg:flex min-h-screen bg-gray-100 dark:bg-gray-900 font-sans">
                @livewire('navigation-menu')
                
                <div class="relative z-10 lg:flex-grow">
                    @livewire('top-navigation')
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        
    </body>
</html>
