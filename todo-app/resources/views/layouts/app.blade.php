<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <x-header>
        @yield('header', 'Default Header')
    </x-header>
    <main>
        @yield('content')
    </main>
</body>
</html>