<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Добро пожаловать')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @yield('content')
</body>
</html>
