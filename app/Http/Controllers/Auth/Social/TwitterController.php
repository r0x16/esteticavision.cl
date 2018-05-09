<?php

namespace App\Http\Controllers\Auth\Social;

use Illuminate\Http\Request;
use Socialite;

class TwitterController extends SocialController
{
    public function __construct() {
        $this->provider = 'twitter';
    }

    public function login() {
        return Socialite::driver('twitter')->redirect();
    }

    public function callback(Request $request) {
        $data = Socialite::driver('twitter')->user();
        $user = $this->getUser($data);
        $this->refreshOAuthOneIdentity($user, $data);
        $this->logon($user);
        return $this->redirect();
    }
}
