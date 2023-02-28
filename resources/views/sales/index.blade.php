@extends('layouts.app')
@section('content')

    <h2>Список продаж</h2>
    @if ($sales->all() == [])
        <div align="center">
            <i class="fa-solid fa-file-circle-xmark" style="font-size: 85px; margin: 20px; color: silver;"></i>
            <p>Список продаж пуст.</p>
            <a href="{{ route('sales.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить новую
                запись</a>
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col">#</th>
                    <th scope="col">Клиент</th>
                    <th scope="col">Дом</th>
                    <th scope="col">Квартира</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Дата продажи</th>
                    <th scope="col" style="text-align: end">Buttons</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                <tr>

                    @foreach ($sales as $sale)
                        <td style="text-align: center">{{ $sale->id }}</td>
                        <td>{{ $sale->client->name }}</td>
                        <td>{{ $sale->house->name }}</td>
                        <td>#{{ $sale->apartment->number }}</td>
                        <td>{{ $sale->price }} сом</td>
                        <td>{{ $sale->date_of_sale }}</td>

                        <td align="end">
                            <a href="{{ route('sales.show', $sale) }}" class="btn btn-success " tabindex="-1"
                                role="button"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('sales.edit', $sale) }}" class="btn btn-primary " tabindex="-1"
                                role="button"><i class="fa-solid fa-pen"></i></a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-table="sales" data-id="{{ $sale->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>

                </tr>
    @endforeach

    </tbody>
    </table>

    <a href="{{ route('sales.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить запись</a>


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
    @endif

@endsection
