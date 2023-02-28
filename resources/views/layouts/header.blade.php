<nav class="navbar  navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <div class="container-fluid container">

        <div class="collapse  navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item d-flex me-2">
                    <a class="nav-link " aria-current="page" href="{{ route('/') }}">Home</a>
                    <a class="nav-link " aria-current="page" href="{{ route('houses.index') }}">Дома</a>
                    <a class="nav-link " aria-current="page" href="{{ route('apartments.index') }}">Квартиры</a>
                    <a class="nav-link " aria-current="page" href="{{ route('clients.index') }}">Клиенты</a>
                    <a class="nav-link " aria-current="page" href="{{ route('sales.index') }}">Продажи</a>
                    <a class="nav-link " aria-current="page" href="{{ route('houses_list.index') }}">Список продаж</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
