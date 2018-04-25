<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Services\CartService;
use Illuminate\Http\Request;

class SetShoppingCart
{

    private $cs;
    private $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CartService $cs, Request $request)
    {
        $this->cs = $cs;
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Authenticated  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $cart = $this->cs->getSessionCart();

        if($cart !== null) {
            $cart->user()->associate($event->user);
            $cart->save();
            $event->user->currentCart()->associate($cart);
            $event->user->save();
            $this->request->session()->forget('cart');
        }
    }
}
