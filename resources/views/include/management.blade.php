<div class="row" id="managementBar">
    <div class="col-md-7">
        <form action="/search" method="get">
            <div class="input-group">
                <input name="q" type="text" class="form-control" id="searchInput" placeholder="Buscar en Estética Visión...">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" id="searchButton">
                        <span class="icon-search"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-5" id="userTab">
        <div class="row">
            <div class="col-auto text-left">
                @include('include.cart-badge')
            </div>
            @auth
                <div class="col text-right">
                    Bienvenido, {{ $user->name }}
                </div>
                <div class="col-md-3">
                    <form action="/logout" method="post">
                        {{ csrf_field() }}
                        <input type="submit" value="Salir" class="btn btn-danger btn-block">
                    </form>
                </div>
            @endauth
            @guest
                <div class="col-10">
                    <a href="/register" class="btn btn-primary">Conectarse</a>
                </div>
            @endguest
        </div>
    </div>
</div>