@extends('layouts.app')
@section('content')
    <h2>Редактировать дом</h2>
    <form action="{{ route('houses.update', $house) }}" method="post">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Название дома</label>
            <input type="text" name="name" value="{{ $house->name }}" class="form-control"
                placeholder="Введите название дома... К примеру, Дом №32">
        </div>
        <div class="form-group">
            <label for="floors">Количество этажей</label>
            <input type="number" name="floors" value="{{ $house->floors }}" class="form-control"
                placeholder="Укажите количество этажей">
        </div>
        <div class="form-group">
            <label for="price">Цена за 1 квадратный метр</label>
            <input type="number" name="price" value="{{ $house->price }}" class="form-control"
                placeholder="Укажите цену за один квадратный метр">
        </div>


        <div class="form-group">
            <label for="year_of_construction">Год постройки</label>
            <input style="width: max-content" value="{{ $house->year_of_construction }}" type="date"
                name="year_of_construction" class="form-control">
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Обновить запись</button>
    </form>
@endsection
