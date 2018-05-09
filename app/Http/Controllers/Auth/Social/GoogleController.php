<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;

class GoogleController extends SocialController
{

    public function __construct() {
        $this->provider = 'google';
    }

    public function login() {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request) {
        $data = Socialite::driver('google')->user();
        $user = $this->getUser($data);
        $this->refreshOAuthTwoIdentity($user, $data);
        $this->logon($user);
        return $this->redirect();
    }
}
