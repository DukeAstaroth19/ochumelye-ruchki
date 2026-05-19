@extends('layouts.app')

@section('title', $masterClass->title)

@section('content')
<div class="main">
    <div class="row">
        <div class="hover"></div>
        <div class="title">{{ $masterClass->title }}</div>
        <div class="row--small grid between">
            <div class="content">
                <h2>{{ $masterClass->title }}</h2>
                <p><strong>Вид творчества:</strong> {{ $masterClass->craft->name }}</p>
                <p><strong>Ведущий:</strong> {{ $masterClass->teacher->name }}</p>
                <p><strong>Дата и время:</strong> {{ $masterClass->date->format('d.m.Y') }} в {{ $masterClass->time->format('H:i') }}</p>
                <p><strong>Стоимость:</strong> {{ $masterClass->price }} ₽</p>
                <p><strong>Свободных мест:</strong> {{ $masterClass->available_seats }} из {{ $masterClass->max_participants }}</p>
                <p><strong>Описание:</strong></p>
                <p>{{ $masterClass->description }}</p>
                
                @auth
                    @php
                        $isBooked = Auth::user()->bookedClasses->contains($masterClass->id);
                    @endphp
                    
                    @if($isBooked)
                        <form method="POST" action="{{ route('master-class.cancel', $masterClass->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background: #f44336; border-color: #f44336;">Отменить запись</button>
                        </form>
                    @elseif($masterClass->available_seats > 0)
                        <form method="POST" action="{{ route('master-class.book', $masterClass->id) }}">
                            @csrf
                            <button type="submit" class="btn">Записаться</button>
                        </form>
                    @else
                        <button class="btn" disabled style="opacity: 0.5;">Мест нет</button>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn">Войдите для записи</a>
                @endauth
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