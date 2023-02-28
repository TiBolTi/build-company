@extends('layouts.app')
@section('content')
    <h2>Список Квартир</h2>

    @if ($apartments->all() == [])
        <div align="center">
            <i class="fa-solid fa-file-circle-xmark" style="font-size: 85px; margin: 20px; color: silver;"></i>
            <p>Список квартир пуст.</p>
            <a href="{{ route('apartments.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить новую
                квартиру</a>
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col"># </th>
                    <th scope="col">Номер квартиры</th>
                    <th scope="col">Дом</th>
                    <th scope="col">Этаж квартиры</th>
                    <th scope="col">Количество комнат</th>
                    <th scope="col">Площадь квартиры</th>
                    <th scope="col" style="text-align: end">Buttons</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                <tr>

                    @foreach ($apartments as $apartment)
                        <td style="text-align: center">{{ $apartment->id }}</td>
                        <td>№ {{ $apartment->number }}</td>
                        <td>{{ $apartment->house->name }}</td>
                        <td>{{ $apartment->floor }} этаж</td>
                        <td>{{ $apartment->rooms }} комнат</td>
                        <td>{{ $apartment->area }} m2</td>

                        <td align="end">
                            <a href="{{ route('apartments.show', $apartment) }}" class="btn btn-success " tabindex="-1"
                                role="button"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('apartments.edit', $apartment) }}" class="btn btn-primary " tabindex="-1"
                                role="button"><i class="fa-solid fa-pen"></i></a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-table="apartments" data-id="{{ $apartment->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                </tr>
    @endforeach

    </tbody>
    </table>

    <a href="{{ route('apartments.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить
        квартиру</a>
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
