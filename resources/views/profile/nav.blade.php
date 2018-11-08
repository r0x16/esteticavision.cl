<nav id="profile_nav">
    <h3>Navegación</h3>
    <ul>
        <li><a href="/cart">Carrito de Compra</a></li>
        @auth
        <li><a href="/quotations">Mis Cotizaciones</a></li>
        <li><a href="/profile">Mis Datos</a></li>
        <li><a href="/order_data">Información de Facturación</a></li>
        @endauth
    </ul>
</nav>