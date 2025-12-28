<!DOCTYPE html>
<html :class="dark ? 'dark' : ''" x-data="data()" lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="shortcut icon" href="{{ asset('assets/img/logo.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="/assets/css/datatables.min.css" />
        <script src="/assets/js/datatables.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css" />
    </head>

    <body>
        <div class="flex h-screen bg-gray-50 dark:bg-gray-900 font-inter"
            :class="{ 'overflow-hidden': isSideMenuOpen }">
            <x-sidebar />
            <div class="flex flex-col flex-1 w-full">
                <x-header />
                <main class="h-full overflow-y-auto">
                    <div class="container px-6 mx-auto grid">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="/assets/js/init-alpine.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
        <script src="/assets/js/utils.js" defer></script>

    </body>

</html>
