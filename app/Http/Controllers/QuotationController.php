<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use App\Services\CartService;
use App\Services\QuotationsService;
use App\Events\OrderConfirmation;

class QuotationController extends Controller
{

    private $cs;
    private $qs;

    public function __construct(CartService $cs, QuotationsService $qs) {
        $this->cs = $cs;
        $this->qs = $qs;
    }

    public function index() {
        return view('quotations', [
            'quotations' => $this->qs->getAll()
        ]);
    }

    public function show(Quotation $quotation) {
        return view('quotations.show', [
            'quote' => $quotation,
            'products' => $quotation->cart->products
        ]);
    }

    public function toCart() {
        return redirect('/cart');
    }

    public function quoted() {
        return view('quoted');
    }

    public function quote(Request $request) {
        $validated = $request->validate([
            'extra' => 'nullable|max:3000',
            'cc' => 'nullable|max:191|email'
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

        event(new OrderConfirmation($quotation));

        return redirect('quoted');

    }
}
