<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-main">
    <div id="app">
        @include('nav.main')

        <main>
            @yield('content')
        </main>

        <footer>
            @include('footer.main')
        </footer>
        <notification-success message="{{session('success')}}"></notification-success>
        <notification-warning message="{{session('warning')}}"></notification-warning>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
