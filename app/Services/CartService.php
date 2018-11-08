<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Cart;

class CartService {

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getActiveCart() {
        if (\Auth::check()) {
            return $this->request->user()->currentCart;
        }

        return $this->getSessionCart();
    }

    public function getSessionCart() {
        if($this->request->session()->has('cart')) {
            return Cart::find($this->request->session()->get('cart'));
        }
        return null;
    }

    public function getOrCreateActiveCart() {
        $active = $this->getActiveCart();
        if ($active === null) {
            $active = $this->createCart();
        }
        return $active;
    }

    public function getBadgeCount() {
        $active = $this->getActiveCart();
        if($active === null) {
            return null;
        }
        return $active->products()->count();
    }

    public function dissociateCart() {
        if(\Auth::check()) {
            $user = $this->request->user();
            $user->currentCart()->dissociate();
            $user->save();
        } else {
            $this->request->session()->forget('cart');
        }
    }

    private function createCart() {
        $cart = new Cart;
        $cart->uuid = $this->request->session()->getId();
        if(\Auth::check()) {
            $user = $this->request->user();
            $user->carts()->save($cart);
            $user->currentCart()->associate($cart);
            $user->save();
        } else {
            $cart->save();
            $this->request->session()->put('cart', $cart->id);
        }

        return $cart;
    }

}