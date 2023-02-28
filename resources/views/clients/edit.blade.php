@extends('layouts.app')
@section('content')
    <h2>Изменить запись клиента</h2>
    <form action="{{ route('clients.update', $client) }}" method="post">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Имя клиента</label>
            <input type="text" name="name" value="{{ $client->name }}" class="form-control"
                placeholder="Введите имя клиента">
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="number" name="phone" value="{{ $client->phone }}" class="form-control"
                placeholder="Укажите номер телефона">
        </div>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" value="{{ $client->email }}" class="form-control"
                placeholder="Укажите почту">
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Обновить запись</button>
    </form>
@endsection
