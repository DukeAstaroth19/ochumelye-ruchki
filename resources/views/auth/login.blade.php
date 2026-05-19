@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<div class="main">
    <div class="row">
        <div class="row--small">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Вход в личный кабинет</h2>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </div>
                
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <button class="btn">Войти</button>
                </div>
                
                <div class="form-group" style="text-align: center;">
                    <a href="{{ route('register') }}" style="color: #20416c;">Нет аккаунта? Зарегистрироваться</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection