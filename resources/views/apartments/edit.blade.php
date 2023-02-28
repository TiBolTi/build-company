@extends('layouts.app')
@section('content')
    <h2>Редактировать квартиру</h2>
    <form action="{{ route('apartments.update', $apartment) }}" method="POST">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="number">Номер квартиры</label>
            <input type="number" value="{{ $apartment->number }}" name="number" class="form-control"
                placeholder="Укажите номер квартиры">
        </div>
        <div class="form-group">
            <label for="house_id">Дом</label>
            <select class="form-select" name="house_id" aria-label="Default select example">
                @foreach ($houses as $house)
                    <option selected value="{{ $house->id }}">{{ $house->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="floor">Этаж квартиры</label>
            <input type="number" value="{{ $apartment->floor }}" name="floor" class="form-control"
                placeholder="Укажите этаж на котором расположенна квартира">
        </div>
        <div class="form-group">
            <label for="rooms">Кол-во комнат</label>
            <input type="number" value="{{ $apartment->rooms }}" name="rooms" class="form-control"
                placeholder="Укажите количество комнат в кваритре">
        </div>
        <div class="form-group">
            <label for="area">Площать квартиры</label>
            <input type="number" value="{{ $apartment->area }}" name="area" class="form-control"
                placeholder="Укажите площать квартиры в квадтардных метрах">
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Обновить запись</button>
    </form>
@endsection
