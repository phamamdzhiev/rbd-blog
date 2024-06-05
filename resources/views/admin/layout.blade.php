<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased ">
<main class="container py-4">
    @yield('body')
</main>
</body>
</html>
