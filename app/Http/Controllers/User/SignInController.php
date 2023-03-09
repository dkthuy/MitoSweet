<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite as Socialite;

class SignInController extends Controller
{
    public function data()
    {
        return view('user.signin');
    }
    public function create()
    {
        return view('user.createaccount');
    }
    public function forget()
    {
        return view('user.forgotpassword');
    }

    public function redirect($provider)
    {
        // dd($provider);
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();

        $user = $this->createUser($getInfo,$provider);

        Auth::guard('user')->login($user);

        return redirect()->route('index');

    }
    function createUser($getInfo,$provider){

     $user = UserAccounts::where('provider_id', $getInfo->id)->first();

     if (!$user) {
         $user = UserAccounts::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
    }
}
