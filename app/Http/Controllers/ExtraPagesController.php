<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExtraPagesController extends Controller
{
    public function aboutPage() {
        return view('extra/about');
    }
}
