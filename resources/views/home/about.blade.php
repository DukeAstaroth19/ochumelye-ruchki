@extends('layouts.app')

@section('title', 'О нас')

@section('content')
<div class="main">
    <div class="row">
        <div class="hover"></div>
        <div class="title">О нас</div>
        <div class="row--small grid between">
            <div class="content">
                <img src="{{ asset('img/logo.png') }}" alt="Логотип" style="float: left; margin-right: 20px; width: 150px;">
                <p>Клуб любителей творчества «ОчУмелые ручки» — это уникальное пространство, где каждый может раскрыть свой творческий потенциал.</p>
                <p><span>Наша миссия</span> — сделать творчество доступным для всех, независимо от возраста и уровня подготовки.</p>
                <p><span>Наши преимущества:</span></p>
                <ul>
                    <li>Опытные педагоги-практики</li>
                    <li>Уникальные авторские программы</li>
                    <li>Индивидуальный подход к каждому ученику</li>
                    <li>Уютная творческая атмосфера</li>
                </ul>
                <p>Присоединяйтесь к нам и откройте для себя удивительный мир творчества!</p>
            </div>
            <ul class="menu">
                <li><a href="{{ route('craft.show', 1) }}">Архитектурное моделирование</a></li>
                <li><a href="{{ route('craft.show', 2) }}">Кулинария</a></li>
                <li><a href="{{ route('craft.show', 3) }}">Резьба по дереву</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection