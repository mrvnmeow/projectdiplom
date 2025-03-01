<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать в AIMDO</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Добро пожаловать в AIMDO</h1>
            <p>Управляйте своими задачами с легкостью и удобством.</p>
            <div class="buttons">
                <a href="{{ route('login') }}" class="btn">Войти</a>
                <a href="{{ route('register') }}" class="btn">Регистрация</a>
            </div>
        </div>
    </div>
</body>
</html>
