@extends('layouts.app')
@section('content')

    <h2>Список домов</h2>
    @if ($houses->all() == [])
        <div align="center">
            <i class="fa-solid fa-file-circle-xmark" style="font-size: 85px; margin: 20px; color: silver;"></i>
            <p>Список домов пуст.</p>
            <a href="{{ route('houses.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить новый
                дом</a>
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col">#</th>
                    <th scope="col">Название дома</th>
                    <th scope="col">Кол-во этажей</th>
                    <th scope="col">Цена за 1 m2</th>
                    <th scope="col">Год постройки</th>
                    <th scope="col" style="text-align: end">Buttons</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                <tr>
                    @foreach ($houses as $house)
                        <td style="text-align: center">{{ $house->id }}</td>
                        <td>{{ $house->name }}</td>
                        <td>{{ $house->floors }} этажей</td>
                        <td>{{ $house->price }} сом</td>
                        <td>{{ $house->year_of_construction }}</td>
                        <td align="end">
                            <a href="{{ route('houses.show', $house) }}" class="btn btn-success " tabindex="-1"
                                role="button"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('houses.edit', $house) }}" class="btn btn-primary " tabindex="-1"
                                role="button"><i class="fa-solid fa-pen"></i></a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-table="houses" data-id="{{ $house->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                </tr>
    @endforeach

    </tbody>
    </table>

    <a href="{{ route('houses.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить дом</a>
    @endif
@section('delete')
    <script>
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var table = button.getAttribute('data-table');
            var id = button.getAttribute('data-id');
            var form = deleteModal.querySelector('form');
            var actionUrl = "{{ url('/') }}/" + table + "/" + id;
            form.setAttribute('action', actionUrl);
        });
    </script>
@endsection
@endsection
