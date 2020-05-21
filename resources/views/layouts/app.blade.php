<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="@yield('title') | {{ config('app.name', 'Laravel') }}">
    <meta name="description" content="LACRUDA es un paquete de Laravel 7 diseñado para integrarse maravillosamente mientras le ahorra toneladas de tiempo.">
    <meta name="keywords" content="crud,  ajax,  tables,  generate, table, ui">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="author" content="Lacruda">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/lacruda.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
</head>

<body class="d-flex flex-column h-100">
    @yield('parent-content')

    @include('lacruda::layouts.alert')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>
    <script src="{{ asset('js/lacruda.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @stack('scripts')
</body>

</html>