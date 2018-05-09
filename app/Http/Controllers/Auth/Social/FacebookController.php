<?php

namespace App\Http\Controllers\Auth\Social;

use Illuminate\Http\Request;
use Socialite;

class FacebookController extends SocialController
{
    public function __construct() {
        $this->provider = 'facebook';
    }

    public function login() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(Request $request) {
        $data = Socialite::driver('facebook')->user();
        $user = $this->getUser($data);
        $this->refreshOAuthTwoIdentity($user, $data);
        $this->logon($user);
        return $this->redirect();
    }
}
