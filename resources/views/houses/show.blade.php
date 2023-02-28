@extends('layouts.app')
@section('content')
    <h2>Подробнее о записи дома</h2>
    <div>
        <label for="name">Название дома</label>
        <p>№{{ $house->name }}</p>
    </div>
    <div class="form-group">
        <label for="floors">Количество этажей</label>
        <p>{{ $house->floors }}</p>
    </div>
    <div class="form-group">
        <label for="price">Цена за квадратный метр</label>
        <p>{{ $house->price }} сом за 1 m2</p>
    </div>
    <div class="form-group">
        <label for="year_of_construction">Год постройки</label>
        <p>{{ $house->year_of_construction }}</p>
    </div>
@endsection
