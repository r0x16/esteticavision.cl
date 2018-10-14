<div class="row">
    <div class="col-md-8">
        <div id="cart_list">
            @foreach($cart->products as $product)
                @include('cart.item')
            @endforeach
        </div>
    </div>
    <div class="col-md-4">
        @auth
            @include('cart.checkout')
        @endauth
        @guest
            @include('cart.login')
        @endguest
    </div>
</div>