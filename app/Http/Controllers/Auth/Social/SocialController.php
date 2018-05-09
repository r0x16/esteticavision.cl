<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UsersIdentity;

class SocialController extends Controller
{

    public $provider;

    protected function getUser($user) {
        $account = $this->getDatabaseUser($user);
        if($account === null) {
            $account = $this->createUser($user);
        } else {
            $this->refreshUser($account, $user);
        }
        return $account;
    }

    protected function refreshOAuthTwoIdentity($account, $user) {
        $identity = $this->getIdentity($account);
        if($identity === null) {
            $identity = $this->createOauthTwoIdentity($account, $user);
        } else {
            $this->updateOauthTwoIdentity($identity, $user);
        }
    }

    protected function refreshOAuthOneIdentity($account, $user) {
        $identity = $this->getIdentity($account);
        if($identity === null) {
            $identity = $this->createOAuthOneIdentity($account, $user);
        } else {
            $this->updateOAuthOneIdentity($identity, $user);
        }
    }

    protected function logon($user) {
        auth()->login($user, true);
    }

    protected function redirect() {
        return redirect('/');
    }

    private function getDatabaseUser($user) {
        return User::where('email', $user->getEmail())->first();
    }

    private function createUser($user) {
        $u = new User;
        $u->name = $user->getName();
        $u->email = $user->getEmail();
        $u->password = bcrypt(str_random(64));
        $u->photo = $user->getAvatar();
        $u->save();

        return $u;
    }

    private function refreshUser($user, $newData) {
        $user->name = $newData->getName();
        $user->photo = $newData->getAvatar();
        $user->save();
    }

    private function getIdentity($user) {
        $provider_id = config('auth.providerIndex')[$this->provider];
        return $user->identity()->where('provider', $provider_id)->first();
    }

    private function createOauthTwoIdentity($account, $user) {
        $i = new UsersIdentity;
        $i->provider = config('auth.providerIndex')[$this->provider];
        $i->provider_user_id = $user->getId();
        $i->access_token = $user->token;
        $i->refresh_token = $user->refreshToken;
        $i->expires_in = now()->addMinutes($user->expiresIn);
        $account->identity()->save($i);

        return $i;
    }

    private function updateOauthTwoIdentity($identity, $user) {
        $identity->access_token = $user->token;
        $identity->refresh_token = $user->refreshToken;
        $identity->expires_in = now()->addMinutes($user->expiresIn);
        $identity->save();
    }

    private function createOAuthOneIdentity($account, $user) {
        $i = new UsersIdentity;
        $i->provider = config('auth.providerIndex')[$this->provider];
        $i->provider_user_id = $user->getId();
        $i->access_token = $user->token;
        $i->token_secret = $user->tokenSecret;
        $account->identity()->save($i);

        return $i;
    }

    private function updateOAuthOneIdentity($identity, $user) {
        $identity->access_token = $user->token;
        $identity->token_secret = $user->tokenSecret;
        $identity->save();
    }
}
