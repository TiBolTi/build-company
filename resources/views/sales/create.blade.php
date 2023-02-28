@extends('layouts.app')
@section('content')
    <h2>Создать запись о продаже</h2>
    <form action="{{ route('sales.store') }}" method="POST">

        @csrf
        <div class="form-group">
            <label for="client_id">Клиент</label>
            <select class="form-select" name="client_id" aria-label="Default select example">
                <option selected>Веберете клиента</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="house_id">Дом</label>
            <select class="form-select" name="house_id" aria-label="Default select example">
                <option selected>Веберете дом</option>
                @foreach ($houses as $house)
                    <option value="{{ $house->id }}">{{ $house->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="apartment_id">Квартира</label>
            <select class="form-select" name="apartment_id" aria-label="Default select example">
                <option selected>Веберете квартиру</option>
                @foreach ($apartments as $apartment)
                    <option value="{{ $apartment->id }}">{{ $house->name }} Квартира №{{ $apartment->number }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_sale">Год продажи</label>
            <input style="width: max-content" type="date" name="date_of_sale" class="form-control">
        </div>

        <button type="submit" class="btn mt-2 btn-primary">Добавить запись</button>
    </form>
@endsection
