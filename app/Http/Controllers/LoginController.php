<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $userRepository)
    {
        $user = Socialite::driver('vkontakte')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('home');
        // $user->token;
    }
    public function loginGitHub(){
        return Socialite::driver('github')->redirect();
    }
    public function responseGitHub(UserRepository $userRepository){
        $user = Socialite::driver('github')->user();
        $userInSystem = $userRepository->getUserBySocId($user, 'git');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}
