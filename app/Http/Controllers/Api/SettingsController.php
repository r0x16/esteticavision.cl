<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Setting;

class SettingsController extends Controller
{
    public function setSingle(Request $request) {
        Setting::set($request->input('key'), $request->input('value'));
        return json_encode(Setting::get($request->input('key')));
    }

    public function getSingle(Request $request) {
        return json_encode(Setting::get($request->input('key')));
    }

    public function forget(Request $request) {
        $actual = Setting::get($request->input('key'));
        Setting::set($request->input('key'), null);
        return json_encode($actual);
    }
}
