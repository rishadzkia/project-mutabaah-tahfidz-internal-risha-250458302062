<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head> 

<body class="flex"> 
    @include('layouts.navbar')

    {{-- Sidebar dinamis --}}
    @include($sidebar)

    {{-- Main Content --}}
    <main class="flex-1 p-6 bg-gray-100 min-h-screen">
        @yield('content')
    </main>

    @livewireScripts
</body> 
</html>
