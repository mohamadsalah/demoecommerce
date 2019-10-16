<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) {
  Auth::logout();
  return redirect('/login');
}

    /**
    * Obtain the user information from Social Logged in.
    * @param $social
    * @return Response
    */
    public function redirect($provider)
     {

     return Socialite::driver($provider)->redirect();


     }

public function TwitterCallback()
{
         $twitterSocial =   Socialite::driver('twitter')->user();
        $user=   User::where(['email' => $twitterSocial->getEmail()])->first();

if($user){
            Auth::login($user);
            return redirect('/home');
        }else{
$user = User::firstOrCreate([
                'name'          => $twitterSocial->getName(),
                'email'         => $twitterSocial->getEmail(),
                'profile_picture'         => $twitterSocial->getAvatar(),
                'provider_id'   => $twitterSocial->getId(),
                'provider'      => 'twitter',
            ]);
Auth::login($user);
            return redirect()->route('home');
        }
  }



  public function Callback($provider){
    
        $userSocial =   Socialite::driver($provider)->stateless()->user();
        $user=   User::where(['email' => $userSocial->getEmail()])->first();

if($user){
            Auth::login($user);
            return redirect('/home');
        }else{
$user = User::create([
  
                'name' => $userSocial->getName(),
                'email'=> $userSocial->getEmail(),
                'profile_picture' => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);
Auth::login($user);
         return redirect()->route('home');
        }
}
}
