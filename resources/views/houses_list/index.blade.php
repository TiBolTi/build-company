@extends('layouts.app')
@section('content')


    <h2>Спискок продаж по домам</h2>
    @if ($houses->all() == [])
        <div align="center">
            <i class="fa-solid fa-file-circle-xmark" style="font-size: 85px; margin: 20px; color: silver;"></i>
            <p>Список продаж пуст.</p>
            <a href="{{ route('houses.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить
                новый дом</a>
        </div>
    @else
        <div class="accordion accordion-flush" id="houses-accordion">

            @foreach ($houses as $house)
                {{-- Расчёт общего количества квартир и проданных квартир дома --}}
                <?php $ap_count = DB::table('apartments')
                    ->where('house_id', $house->id)
                    ->count();
                $sold_apartments = DB::table('sales')
                    ->where('house_id', $house->id)
                    ->count(); ?>


                <div class="accordion-item">
                    <span class="accordion-header" id="house-{{ $house->id }}-heading">
                        <table class="table table-bordered table-hover">
                            <thead class="table-warning" style="vertical-align:middle;">
                                {{-- Таблица дома - шапка --}}
                                <tr>
                                    <th style="text-align: center" scope="col">
                                        <i class="fa-solid fa-house" style="font-size: 30px;"></i>
                                    </th>
                                    <th scope="col">Дом</th>
                                    <th scope="col">Количество Этажей</th>
                                    <th scope="col">Количество квартир</th>
                                    <th scope="col">Цена за 1 m2</th>
                                    <th scope="col">Проданно квартир</th>
                                    <th scope="col">Дата Постройки</th>
                                    <th scope="col" class="table-primary" style="text-align: end;padding: unset;">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#house-{{ $house->id }}-collapse" aria-expanded="false"
                                            aria-controls="house-{{ $house->id }}-collapse"></button>
                                    </th>
                                </tr>
                            </thead>

                            {{-- Таблица дома - тело --}}
                            <tr style="vertical-align: middle;">
                                <td style="text-align: center">#{{ $house->id }}</td>
                                <td>{{ $house->name }}</td>
                                <td>{{ $house->floors }} этажей</td>
                                <td>{{ $ap_count }} квартир(а-ы)</td>
                                <td>{{ $house->price }} сом</td>
                                <td>{{ $sold_apartments }} квартир(а-ы)</td>
                                <td>{{ $house->year_of_construction }}</td>
                                <td align="end">
                                    <a href="{{ route('houses.show', $house) }}" class="btn btn-success " tabindex="-1"
                                        role="button"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('houses.edit', $house) }}" class="btn btn-primary " tabindex="-1"
                                        role="button"><i class="fa-solid fa-pen"></i></a>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-table="houses" data-id="{{ $house->id }}"><i
                                            class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>

                            {{--                            Таблица квартир - шапка --}}

                            <tbody id="house-{{ $house->id }}-collapse" class="accordion-collapse collapse "
                                aria-labelledby="house-{{ $house->id }}-heading" data-bs-parent="#houses-accordion"
                                style="vertical-align: middle;">
                                <tr class="table-info">
                                    <th style="text-align: center" scope="col">
                                        <i class="fa-solid fa-key" style="font-size: 30px;"></i>
                                    </th>
                                    <th scope="col">Этаж</th>
                                    <th scope="col">Кол-во комнат</th>
                                    <th scope="col">Площадь m2</th>
                                    <th scope="col">Стоимость</th>
                                    <th scope="col">Владелец</th>
                                    <th scope="col">Дата продажи</th>
                                    <th scope="col">Кнопки</th>
                                </tr>

                                {{-- Таблица квартир - тело --}}
                                @foreach ($sales as $sale)
                                    @foreach ($apartments as $apartment)
                                        {{--                                        Проверка на соответсвие проданной кваритры -> дому --}}
                                        @if ($sale->apartment_id == $apartment->id && $sale->house_id == $house->id)
                                            {{--                                            Рассчёт цены квартир --}}
                                            @php
                                                $apartment_area = DB::table('apartments')
                                                    ->select('area')
                                                    ->where('id', $apartment->id)
                                                    ->get()
                                                    ->first()->area;
                                                $house_price = DB::table('houses')
                                                    ->select('price')
                                                    ->where('id', $house->id)
                                                    ->get()
                                                    ->first()->price;
                                                $total_price = $house_price * $apartment_area;
                                            @endphp

                                            <tr>
                                                <td style="text-align: center">№{{ $apartment->number }}</td>
                                                <td>{{ $apartment->floor }} этаж</td>
                                                <td>{{ $apartment->rooms }} Комнаты</td>
                                                <td>{{ $apartment->area }} m2</td>
                                                <td>{{ $total_price }} сом</td>
                                                <td>{{ $sale->client->name }}</td>
                                                <td>{{ $sale->date_of_sale }}</td>


                                                <td align="end">
                                                    <a href="{{ route('apartments.show', $apartment) }}"
                                                        class="btn btn-success " tabindex="-1" role="button"><i
                                                            class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('apartments.edit', $apartment) }}"
                                                        class="btn btn-primary " tabindex="-1" role="button"><i
                                                            class="fa-solid fa-pen"></i></a>
                                                    <button class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal" data-table="sales"
                                                        data-id="{{ $sale->id }}"><i
                                                            class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                @endforeach
                                {{-- Кнопки для добавления квартир --}}
                                <tr>
                                    <td colspan="3">
                                        <a href="{{ route('apartments.create') }}" class="btn btn-success btn "
                                            style="width: -webkit-fill-available;" tabindex="-1" role="button">Добавить
                                            кваритру</a>
                                    </td>
                                    <td colspan="3" align="center">Да, я люблю возиться с фронтом. А как, вы узнали?</td>
                                    <td colspan="2">
                                        <a href="{{ route('sales.create') }}" class="btn btn-primary btn "
                                            style="width: -webkit-fill-available;" tabindex="-1" role="button">Выставить
                                            кваритру на продажу</a>
                                    </td>
                                </tr>

                            </tbody>

                        </table>

                    </span>
                </div>
            @endforeach

        </div>
        <a href="{{ route('houses.create') }}" class="btn btn-success btn " tabindex="-1" role="button">Добавить
            дом</a>
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
