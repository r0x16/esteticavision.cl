<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Quotation;

class QuotationController extends Controller
{
    public function index() {
        return Quotation::with('user')->orderBy('created_at', 'desc')->paginate(15);
    }

    public function status() {
        return Quotation::$statusMessages;
    }

    public function editStatus(Quotation $quotation, Request $request) {
        $quotation->status = $request->status;
        $quotation->save();
        return $quotation;
    }

    public function getDetail(Quotation $quotation) {
        $products = $quotation->cart->products;
        return $products;
    }
}
