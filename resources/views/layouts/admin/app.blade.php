<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('assets/images/Logo-Laboratorium.png') }}" type="image/x-icon" />


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" antialiased">
    <div x-data="{ open: false }" class="min-h-screen bg-gray-950 flex">
        @include('layouts.admin.sidebar')
        <div class="flex-1 flex-col ">
            @include('layouts.admin.header')
            <main class="flex-1 p-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
