<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
   {{-- @if(Auth::user()->role === 'guru')
   @include('components.sidebar-guru')
   @elseif(Auth::user()->role === 'siswa')
   @include('components.sidebar-siswa')
   @endif --}}
   @include('components.sidebar-siswa')

    {{-- MAIN AREA --}}
    <div class="flex-1 flex flex-col">

        {{-- NAVBAR --}}
        @include('components.navbar')

        {{-- PAGE CONTENT --}}
        <main class="p-6">
            @yield('content')
        </main>

    </div>

</div>

@livewireScripts
</body>
</html>
