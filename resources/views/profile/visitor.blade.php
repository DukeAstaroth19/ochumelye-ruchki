@extends('layouts.app')

@section('title', 'Мои записи')

@section('content')
<div class="main dp">
    <div class="row">
        <div class="hover"></div>
        <div class="title"></div>
        <div class="row--small grid between">
            <div class="content driver-page">
                <div class="driver-page-photo">
                    <img src="{{ asset('img/driver-page.png') }}" alt="{{ $user->name }}">
                </div>  
                <div class="driver-page-name">{{ $user->name }}</div>
                <div class="driver-page-text">
                    <div class="driver-page-my">Мои записи на мастер-классы</div>
                    <table class="driver-page-table">
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->masterClass->date->format('d.m.Y') }} {{ $booking->masterClass->time->format('H:i') }}</td>
                                    <td>
                                        <b>{{ $booking->masterClass->title }}</b>
                                        <p>
                                            Вид творчества: {{ $booking->masterClass->craft->name }}<br>
                                            Ведущий: {{ $booking->masterClass->teacher->name }}<br>
                                            Стоимость: {{ $booking->masterClass->price }} ₽
                                        </p>
                                        <form method="POST" action="{{ route('master-class.cancel', $booking->masterClass->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn" style="padding: 5px 15px; font-size: 12px;">Отменить запись</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">У вас пока нет записей на мастер-классы</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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