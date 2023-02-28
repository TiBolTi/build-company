@extends('layouts.app')
@section('content')
    <h2>Подробнее о записи продаж</h2>

    <div>
        <label for="client_id">Клиент</label>
        <p>{{ $sale->client->name }}</p>
    </div>
    <div class="form-group">
        <label for="house_id">Дом</label>
        <p>{{ $sale->house->name }}</p>
    </div>
    <div class="form-group">
        <label for="number">Квартира</label>
        <p>{{ $sale->apartment->number }}</p>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <p>{{ $sale->price }} сом</p>
    </div>
    <div class="form-group">
        <label for="date_of_sale">Дата продажи</label>
        <p>{{ $sale->date_of_sale }}</p>
    </div>
@endsection
