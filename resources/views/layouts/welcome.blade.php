@extends('layouts.welcome')

@section('title', 'Добро пожаловать')

@section('content')
    <div class="container">
        <h1>Добро пожаловать в AIMDO</h1>
        <p>Управляйте своими задачами с легкостью и удобством.</p>
        <div class="buttons">
            <a href="{{ route('login') }}" class="btn">Войти</a>
            <a href="{{ route('register') }}" class="btn">Регистрация</a>
        </div>
    </div>
@endsection
