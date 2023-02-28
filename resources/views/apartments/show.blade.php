@extends('layouts.app')
@section('content')
    <h2>Подробнее о записи квартиры</h2>

    <div>
        <label for="number">Номер квартиры</label>
        <p>#{{ $apartment->number }}</p>
    </div>

    <div class="form-group">
        <label for="house_id">Дом</label>
        <p>№{{ $apartment->house_id }}</p>
    </div>
    <div class="form-group">
        <label for="floor">Этаж</label>
        <p>{{ $apartment->floor }} этаж</p>
    </div>
    <div class="form-group">
        <label for="rooms">Количество комнат</label>
        <p>{{ $apartment->rooms }} комнат</p>

        <div class="form-group">
            <label for="area">Площадь квартиры</label>
            <p>{{ $apartment->area }} m2</p>
        </div>
    @endsection
