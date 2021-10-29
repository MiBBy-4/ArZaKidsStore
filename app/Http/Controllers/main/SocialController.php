<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Services\main\SocialService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    
    public function index()
    {

        return Socialite::driver("vkontakte")->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver("vkontakte")->user();

        $objSocial = new SocialService();

        if($user = $objSocial->saveSocialDate($user)){
            Auth::login($user);

            return redirect()->route("main.index");
        }

        return back();
    }
}
