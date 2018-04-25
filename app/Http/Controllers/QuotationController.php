<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Services\CartService;

class QuotationController extends Controller
{

    private $cs;

    public function __construct(CartService $cs) {
        $this->cs = $cs;
    }

    public function toCart() {
        return redirect('/cart');
    }

    public function quoted() {
        return view('quoted');
    }

    public function quote(Request $request) {
        $validated = $request->validate([
            'extra' => 'nullable|max:3000|alpha_dash',
            'cc' => 'nullable|max:191'
        ]);

        $cart = $this->cs->getActiveCart();
        $user = $request->user();

        $quotation = new Quotation;
        $quotation->status = 0;
        $quotation->user()->associate($user);
        $quotation->cart()->associate($cart);
        $quotation->email_cc = $validated['cc'];
        $quotation->extra = $validated['extra'];

        $quotation->save();

        $user->currentCart()->associate(null);
        $user->save();

        return redirect('quoted');

    }
}
