@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<div class="main">
    <div class="row">
        <div class="row--small">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2>Форма регистрации</h2>
                
                <div class="form-group">
                    <label>ФИО</label>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Пароль</label>
                    <input type="password" name="password" required>
                    @error('password')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label>Номер телефона</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div style="color: red; font-size: 12px;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <button class="btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection