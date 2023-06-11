<?php

namespace App\Http\Controllers;
use Socialite;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class SocialauthController extends Controller
{
  public function redirect($provider)
  {
   return Socialite::driver($provider)->redirect();
  }
  public function Callback($provider)
  {
    {
      $userSocial =   Socialite::driver($provider)->stateless()->user();
      $users       =   User::where(['email' => $userSocial->getEmail()])->first();
      if($users)
      {
          Auth::login($users);
          return redirect()->route('home');
      }
      else
      {
        $user = User::create([
              'name' => $userSocial->getName(),
              'email' => $userSocial->getEmail(),
              'profile_photo_path' => $userSocial->getAvatar(),
              'provider_id' => $userSocial->getId(),
              'provider' => $provider,
              //bypasss email verification for social logins
              'email_verified_at' => Carbon::now(),
              'user_type' => Session::get('user_type') ? Session::get('user_type') : 'user',
          ]);
          if(Session::has('user_type')){
              Session::forget('user_type');
          }
          auth()->login($user);

          return redirect()->route('home');
      }
    }
  }
}
