@extends('layouts.app')

@section('title', 'Личный кабинет ведущего')

@section('content')
<div class="main dp">
    <div class="row">
        <div class="hover"></div>
        <div class="title"></div>
        <div class="row--small grid between">
            <div class="content driver-page">
                <div class="driver-page-photo">
                    <img src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('img/driver-page.png') }}" alt="{{ $user->name }}">
                </div>  
                <div class="driver-page-name">{{ $user->name }}</div>
                <div class="driver-page-text">
                    <div class="driver-page-my">Мои мастер-классы</div>
                    <table class="driver-page-table">
                        <tbody>
                            @forelse($masterClasses as $class)
                                <tr>
                                    <td>{{ $class->date->format('d.m.Y') }} {{ $class->time->format('H:i') }}</td>
                                    <td>
                                        <b>{{ $class->title }}</b>
                                        @forelse($class->participants as $participant)
                                            <p>
                                                {{ $loop->iteration }}. {{ $participant->name }}<br>
                                                email: {{ $participant->email }}<br>
                                                tel: {{ $participant->phone }}
                                            </p>
                                        @empty
                                            <p>Нет записанных участников</p>
                                        @endforelse
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">У вас пока нет мастер-классов</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="driver-page-btn-wrapper">
                    <a href="{{ route('master-class.create') }}" class="driver-page-btn btn">Добавить мастер-класс</a>
                </div>
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