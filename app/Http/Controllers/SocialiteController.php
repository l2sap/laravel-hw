<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Socialite;
use App\Services\SocialService;

class SocialiteController extends Controller
{
    public function init()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callback(SocialService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        $authUser = $service->updateUser($user);
        if ($authUser) {

            return redirect()->route('account');

            throw new \Exception("User not found");
        }
    }
}
