<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SIGAC'))</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
        }
        header {
            background: linear-gradient(90deg, #0d6efd 0%, #0b5ed7 100%);
            color: #fff;
        }
        footer {
            background-color: #fff;
            border-top: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-column min-vh-100">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Header -->
        @isset($header)
        <header class="py-4 shadow-sm">
            <div class="container">
                <h1 class="h3 fw-bold m-0">{{ $header }}</h1>
            </div>
        </header>
        @endisset

        <!-- Main Content -->
        <main class="flex-grow-1 py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="py-3 text-center text-muted small mt-auto">
            © {{ date('Y') }} {{ config('app.name', 'SIGAC') }}. Todos os direitos reservados.
        </footer>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>