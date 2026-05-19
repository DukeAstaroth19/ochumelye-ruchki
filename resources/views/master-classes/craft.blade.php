@extends('layouts.app')

@section('title', $craft->name)

@section('content')
<div class="main">
    <div class="row">
        <div class="hover"></div>
        <div class="title">{{ $craft->name }}</div>
        <div class="row--small grid between">
            <div class="content">
                <img src="{{ asset('img/elifant.png') }}" alt="{{ $craft->name }}" style="margin-right: 20px; margin-bottom: 20px;">
                {!! nl2br(e($craft->description)) !!}
            </div>
            <ul class="menu">
                <li><a href="{{ route('craft.show', 1) }}">Архитектурное моделирование</a></li>
                <li><a href="{{ route('craft.show', 2) }}">Кулинария</a></li>
                <li><a href="{{ route('craft.show', 3) }}">Резьба по дереву</a></li>
            </ul>
        </div>

        <div class="row shedule">
            <div class="row--small">
                <h2>Расписание</h2>
                <div class="drivers">
                    @forelse($masterClasses as $class)
                        <div class="driver grid">
                            <div class="driver-left grid">
                                <div class="driver-photo">
                                    <img src="{{ $class->teacher->photo ? asset('storage/' . $class->teacher->photo) : asset('img/driver1.png') }}" alt="{{ $class->teacher->name }}">
                                </div>
                                <div class="driver-text">
                                    <div class="driver-name">{{ $class->teacher->name }}</div>
                                    <div class="driver-desc">
                                        <strong>{{ $class->title }}</strong><br>
                                        {{ $class->description }}
                                    </div>
                                </div>
                            </div>
                            <div class="driver-right">
                                @auth
                                    @php
                                        $isBooked = Auth::user()->bookedClasses->contains($class->id);
                                    @endphp
                                    
                                    @if($isBooked)
                                        <form method="POST" action="{{ route('master-class.cancel', $class->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="driver-btn" style="background: #f44336; border-color: #f44336;">Отменить</button>
                                        </form>
                                    @elseif($class->available_seats > 0)
                                        <form method="POST" action="{{ route('master-class.book', $class->id) }}">
                                            @csrf
                                            <button type="submit" class="driver-btn">Записаться</button>
                                        </form>
                                    @else
                                        <button class="driver-btn" disabled style="opacity: 0.5; cursor: not-allowed;">Мест нет</button>
                                    @endif
                                    <div class="driver-time">
                                        {{ $class->date->format('d.m.Y') }} {{ $class->time->format('H:i') }}<br>
                                        {{ $class->price }} ₽ | Свободно: {{ $class->available_seats }}/{{ $class->max_participants }}
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="driver-btn" style="display: inline-block; text-decoration: none;">Записаться</a>
                                    <div class="driver-time">{{ $class->date->format('d.m.Y') }} {{ $class->time->format('H:i') }}</div>
                                @endauth
                            </div>
                        </div>
                    @empty
                        <div class="driver" style="text-align: center; padding: 40px;">
                            <p>В данный момент нет доступных мастер-классов. Скоро появятся новые!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection