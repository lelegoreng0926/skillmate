<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Skillmate'))</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="min-h-screen flex flex-col bg-[#f7f9fd]">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white border-b border-slate-200 shadow-soft">
                    <div class="sm-container py-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </body>
</html>
