@extends('layouts.app')
@section('content')
    <h2>Список клиентов</h2>

    @if ($clients->all() == [])
        <div align="center">
            <i class="fa-solid fa-file-circle-xmark" style="font-size: 85px; margin: 20px; color: silver;"></i>
            <p>Список клиентов пуст.</p>
            <a href="{{ route('clients.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить новую
                запись о клиенте</a>
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center" scope="col">#</th>
                    <th scope="col">Имя клиента</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Почта</th>
                    <th scope="col" style="text-align: end">Buttons</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                <tr>
                    @foreach ($clients as $client)
                        <td style="text-align: center">{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->email }}</td>
                        <td align="end">
                            <a href="{{ route('clients.show', $client) }}" class="btn btn-success " tabindex="-1"
                                role="button"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('clients.edit', $client) }}" class="btn btn-primary " tabindex="-1"
                                role="button"><i class="fa-solid fa-pen"></i></a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-table="clients" data-id="{{ $client->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </td>
                </tr>
    @endforeach

    </tbody>
    </table>

    <a href="{{ route('clients.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить клиента</a>
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
