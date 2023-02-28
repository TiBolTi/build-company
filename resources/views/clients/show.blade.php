@extends('layouts.app')
@section('content')
    <h2>Подробнее о записи клиента</h2>

    <div>
        <label for="name">Имя клиента</label>
        <p>{{ $client->name }}</p>
    </div>
    <div class="form-group">
        <label for="phone">Телефон</label>
        <p>{{ $client->phone }}</p>
    </div>
    <div class="form-group">
        <label for="email">Почта</label>
        <p>{{ $client->email }}</p>
    </div>
@endsection
