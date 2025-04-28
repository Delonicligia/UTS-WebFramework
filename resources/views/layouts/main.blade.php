<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tiket Konser')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    @include('layouts.header')

    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>


    <script>
        document.getElementById('navbar-toggle').addEventListener('click', function () {
            document.getElementById('navbar-menu').classList.toggle('hidden');
        });
    </script>
     @include('layouts.footer')
</body>
</html>
