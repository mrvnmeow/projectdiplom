<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
        <div class="button-container">
        </div>
    </div>
</body>
</html>
