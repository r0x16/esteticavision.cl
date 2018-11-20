<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function index(Request $request) {
        $users = User::orderBy('name', 'asc')->with('identity')->withCount('quotations')->with('invoiceData');
        if($request->q !== null) {
            $users = $users
                        ->where('name', 'like', '%'.$request->q.'%')
                        ->orWhere('email', 'like', '%'.$request->q.'%');
        }
        $users = $users->paginate(15);
        return $users;
    }
}
