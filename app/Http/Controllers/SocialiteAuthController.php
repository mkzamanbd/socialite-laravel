<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteAuthController extends Controller
{
    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook(Request $request)
    {

        $facebook = Socialite::driver('facebook')->user();
        $user = User::where('email', $facebook->email ? $facebook->email : $facebook->id)->first();
        if(!$user){
            $user = User::create([
                'name' => $facebook->name,
                'email' => $facebook->email ? $facebook->email : $facebook->id,
                'google_id' => $facebook->id
            ]);
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function redirectToProviderGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallbackGithub()
    {
        $github = Socialite::driver('github')->user();
        //dd($github);
        $user = User::where('email', $github->email ? $github->email : $github->id)->first();
        if(!$user){
            $user = User::create([
                'name' => $github->name,
                'email' => $github->email?$github->email:$github->id,
                'google_id' => $github->id
            ]);
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }


    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        $google = Socialite::driver('google')->user();
        $user = User::where('email', $google->email ? $google->email : $google->id)->first();
        if(!$user){
            $user = User::create([
                'name' => $google->name,
                'email' => $google->email ? $google->email : $google->id,
                'google_id' => $google->id
            ]);
        }
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
