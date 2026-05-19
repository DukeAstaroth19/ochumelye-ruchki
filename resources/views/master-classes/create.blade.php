@extends('layouts.app')

@section('title', 'Добавить мастер-класс')

@section('content')
<div class="main">
    <div class="row">
        <div class="row--small">
            <h1>Тестовая страница добавления мастер-класса</h1>
            <p>Если вы видите этот текст, значит маршрут работает!</p>
            
            <form method="POST" action="{{ route('master-class.store') }}">
                @csrf
                <h2>Форма добавления мастер-класса</h2>
                
                <div class="form-group">
                    <label>Вид творчества</label>
                    <select name="craft_id" required>
                        <option value="">Выберите вид творчества</option>
                        @foreach($crafts ?? [] as $craft)
                            <option value="{{ $craft->id }}">{{ $craft->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Название мастер-класса</label>
                    <input type="text" name="title" required style="width: 100%;">
                </div>
                
                <div class="form-group">
                    <label>Описание мастер-класса</label>
                    <textarea name="description" required></textarea>
                </div>
                
                <div class="form-group">
                    <label>Дата</label>
                    <input type="date" name="date" required>
                </div>
                
                <div class="form-group">
                    <label>Время</label>
                    <input type="time" name="time" required>
                </div>
                
                <div class="form-group">
                    <label>Количество человек в группе</label>
                    <input type="number" name="max_participants" required min="1">
                </div>
                
                <div class="form-group">
                    <label>Стоимость мастер-класса</label>
                    <input type="number" name="price" required min="0" step="100">
                </div>
                
                <div class="form-group">
                    <button class="btn">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection