<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клуб любителей творчества «ОчУмелые ручки» - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="header">
        <div class="row grid middle between">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="Логотип">
            </div>
            <div class="title">
                Клуб любителей творчества «ОчУмелые ручки»
            </div>
            <div class="auth">
    @auth
        <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
        @if(Auth::user()->role == 'teacher')
            <a href="{{ route('master-class.create') }}" style="margin-left: 10px;">+ Добавить МК</a>
        @endif
        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
            @csrf
            <button type="submit" style="background: none; border: none; color: #00044c; font-weight: bold; cursor: pointer; padding-left: 10px;">Выйти</button>
        </form>
    @else
        <a href="{{ route('login') }}">Вход</a>
    @endauth
</div>
        </div>
    </div>
    
    <div class="row row--nogutter">
        <div class="menu-burger">
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>  
    </div>
    
    <div class="row row--nogutter top-line">
        <div class="line"></div>
    </div>

    @if(session('success'))
        <div style="background: #4CAF50; color: white; padding: 10px; text-align: center; margin: 10px auto; max-width: 1100px;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="background: #f44336; color: white; padding: 10px; text-align: center; margin: 10px auto; max-width: 1100px;">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

    <div class="row row--nogutter">
        <div class="line"></div>
    </div>
    
    <div class="footer">
        <div class="row">
            <div class="row--small grid between">
                <div class="address">Наш адрес: ВДНХ, 120в</div>
                <div class="tel">Тел: 89123456765</div>
                <div class="copy">(с) Copyright, 2017</div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.burger')?.addEventListener('click', function() {
            const menu = document.querySelector('.main .menu');
            if (menu) {
                if (menu.style.display === 'none' || getComputedStyle(menu).display === 'none') {
                    menu.style.display = 'block';
                } else {
                    menu.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>