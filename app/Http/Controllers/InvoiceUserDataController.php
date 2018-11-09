<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceData;

class InvoiceUserDataController extends Controller
{
    public function index(Request $request) {
        return view('invoicedata', [
            'invoice_data' => $this->getInvoiceData($request)
        ]);
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'nullable|max:190',
            'tax_identification_id' => 'nullable|max:190',
            'address' => 'nullable|max:190',
            'bussiness_activity' => 'nullable|max:190',
            'phone' => 'nullable|max:190'
        ]);

        $invoice_data = $this->getInvoiceData($request);
        $invoice_data->name = $validated['name'];
        $invoice_data->tax_identification_id = $validated['tax_identification_id'];
        $invoice_data->address = $validated['address'];
        $invoice_data->bussiness_activity = $validated['bussiness_activity'];
        $invoice_data->phone = $validated['phone'];
        $invoice_data->save();

        return redirect('/invoice_data')->with('status', true);
    }

    private function getInvoiceData(Request $request) {
        $invoice_data = $request->user()->invoiceData;
        if ($invoice_data === null) {
            $invoice_data = new InvoiceData;
            $invoice_data->user()->associate($request->user());
        }
        return $invoice_data;
    }
}
