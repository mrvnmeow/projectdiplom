@extends('layouts.login')

@section('title', 'Вход')

@section('content')
    <div class="container">
        <h1>Вход в AIMDO</h1>

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Электронная почта:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Войти</button>
        </form>

        <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрируйтесь</a></p>
    </div>
@endsection
