<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!-- CSRF Token -->
    <meta content="{{ csrf_token() }}" name="csrf-token">
    <title>
        {{ config('app.name', 'Laravel') }}
    </title>
    <!-- Scripts -->
    <script  src="{{asset('js/app.js')}}"></script>

    <!-- Fonts -->
    <link href="//fonts.gstatic.com" rel="dns-prefetch">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Charmonman' rel='stylesheet'>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
<div >
    @include('layouts.partials._navbar')
    <div id="wrapper">
        @include('layouts.partials._sidebar')
    </div>
    <main class="content">
        @yield('content')
    </main>
</div>

@stack('scripts')
<script src="{{asset('js/custom.js')}}"></script>
</body>
</html>

