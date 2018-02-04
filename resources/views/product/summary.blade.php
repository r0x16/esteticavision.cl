<h1 class="title">{{ $product->name }}</h1>
<div class="code">cod. {{ $product->code }}</div>
@if($product->brand)
    <div class="brand">{{ $product->brand->name }}</div>
@endif
@include('product.rating')
@include('product.addtocart')
<div class="description">
    <div class="description-title">Descripción:</div>
    {{ $product->description }}
</div>
@include('product.tags')