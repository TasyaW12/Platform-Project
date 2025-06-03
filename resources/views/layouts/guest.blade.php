<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LovaLife</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center py-6">
        @yield('content')

        <footer class="mt-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} LovaLife. All rights reserved.
        </footer>
    </div>
</body>
</html>
