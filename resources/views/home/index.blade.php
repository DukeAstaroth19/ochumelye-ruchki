@extends('layouts.app')

@section('title', 'Главная')

@section('content')
<div class="main">
    <div class="row">
        <div class="hover"></div>
        <div class="title"></div>
        <div class="row--small grid between">
            <div class="content">
                <img src="{{ asset('img/elifant.png') }}" alt="Творчество" style="margin-right: 20px; margin-bottom: 20px;">
                <p><span>Добро пожаловать</span> в клуб любителей творчества «ОчУмелые ручки»!</p>
                <p>Мы предлагаем уникальные мастер-классы по различным видам творчества. Наши опытные педагоги помогут вам освоить новые навыки и раскрыть свой творческий потенциал.</p>
                <p><span>Наши направления:</span> архитектурное моделирование, кулинария, резьба по дереву и многие другие.</p>
                <p>Присоединяйтесь к нам и откройте для себя мир творчества!</p>
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