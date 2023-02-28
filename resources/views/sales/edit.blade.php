@extends('layouts.app')
@section('content')
    <h2>Изменить запись о продаже</h2>
    <form action="{{ route('sales.update', $sale) }}" method="POST">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="client_id">Клиент</label>
            <select class="form-select" name="client_id" aria-label="Default select example">
                @foreach ($clients as $client)
                    <option selected value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
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
            <label for="apartment_id">Квартира</label>
            <select class="form-select" name="apartment_id" aria-label="Default select example">
                @foreach ($apartments as $apartment)
                    <option selected value="{{ $apartment->id }}">{{ $apartment->number }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn mt-2 btn-primary">Обновить запись</button>
    </form>
@endsection
