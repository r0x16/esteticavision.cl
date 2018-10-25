<?php
namespace App\Services;

use Illuminate\Http\Request;

class QuotationsService {

    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function getAll() {
        return $this->request->user()->quotations;
    }

}