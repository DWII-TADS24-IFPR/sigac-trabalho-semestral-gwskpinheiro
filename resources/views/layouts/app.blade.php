<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
&nbsp;
&nbsp;

    <title>{{ config('app.name', 'Laravel') }}</title>
&nbsp;
&nbsp;

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
&nbsp;
&nbsp;

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        @include('layouts.navigation')
&nbsp;
&nbsp;

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $header }}</h1>
                </div>
            </header>
        @endisset
&nbsp;
&nbsp;

        <!-- Page Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
&nbsp;
&nbsp;

        <!-- Footer -->
        <footer class="bg-white shadow mt-6">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
                <p class="text-gray-600">© {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>
</body>
</html>