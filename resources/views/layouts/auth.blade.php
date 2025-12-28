<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen flex items-center justify-center p-4">
        @yield('content')
    </body>

</html>
