<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  
use App\SocialAccountService; 
use App\User;
use Socialite;
use App\Social;

class SocialController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    // protected $provider = [
    //     'github',
    //     'facebook',
    //     'google',
    //     'twitter'
    // ];

    //
      public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $service, $provider)
    {
        // whole driver, not only the user. So no more ->user() part

        $user = $service->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);

        return redirect('homepage');
    }

}
