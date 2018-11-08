<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Services\CartService;

use App\Product;

class CartController extends Controller
{
    public function show(Request $request, CartService $cs) {
        $cart = $cs->getActiveCart();
        
        return view('cart', [
            'cart' => $cart
        ]);
    }

    public function addProduct(Request $request, CartService $cs) {

        $validated = $request->validate([
            'product' => 'required|exists:products,id'
        ]);

        $product = Product::findOrFail($validated['product']);
        $cart = $cs->getOrCreateActiveCart();

        if(!$cart->products->contains($product)){
            $cart->products()->attach($product);
        }

        return redirect('/cart');
    }

    public function deleteProduct(Request $request, CartService $cs) {
        $validated = $request->validate([
            'product' => 'required|exists:products,id'
        ]);

        $cart = $cs->getActiveCart();

        if($cart !== null) {
            $cart->products()->detach($validated['product']);
        }

        $product_count = $cart->products()->count();

        if($product_count === 0) {
           $cs->dissociateCart(); 
        }

        return redirect('/cart');
    }

    public function changeQuantity(Request $request, CartService $cs){
        $validated = $request->validate([
            'q' => 'required|numeric|min:1|max:9999',
            'product' => 'required|exists:products,id'
        ]);

        $cart = $cs->getActiveCart();
        
        if($cart !== null){
            $cart->products()->updateExistingPivot($validated['product'], [
                'quantity' => $validated['q']
            ]);
        }

        return redirect('/cart');
    }
}
