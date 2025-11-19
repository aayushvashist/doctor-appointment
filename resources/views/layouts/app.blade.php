<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Doctor Appointment System</title>

    <!-- Bootstrap CSS (Recommended for UI) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    @stack('styles')
</head>

<body class="bg-light">

    <!-- Navigation -->
    @include('layouts.navigation')

    <div class="container mt-4">

        {{-- PAGE TITLE --}}
        @isset($header)
            <h2 class="mb-4">{{ $header }}</h2>
        @endisset

        {{-- PAGE CONTENT --}}
        @yield('content')

    </div>

    <!-- Bootstrap JS -->
    <script src="ht
