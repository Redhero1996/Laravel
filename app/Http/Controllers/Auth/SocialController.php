<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;  
use Exception;
//use App\SocialAccountService; 
use App\User;
use Laravel\Socialite\Facades\Socialite;
//use App\Social;


class SocialController extends Controller
{
     public function __construct()
    {
        $this->middleware('guest');
    }
    protected $providers = [
        'github',
        'facebook',
        'google',
        'twitter'
    ];

    //
      public function redirectToProvider($provider)
    {
       
        if( ! $this->isProviderAllowed($provider) ) {
            return $this->sendFailedResponse("{$provider} is not currently supported");
        }

        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        try {
            //method will read the incoming request and retrieve the user’s information from the provider.
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }

        // check for email in returned user
        return empty( $user->email )
            ? $this->sendFailedResponse("No email id returned from {$provider} provider.")
            : $this->loginOrCreateAccount($user, $provider);
    }

    // Send a successful response
    protected function sendSuccessResponse()
    {
        return redirect()->intended('homepage');
    }
    
    //Send a failed response with a msg
    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')
            ->withErrors(['msg' => $msg ?: 'Unable to login, try with another provider to login.']);
    }

    //loginOrCreateAccount
    protected function loginOrCreateAccount($providerUser, $provider)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if( $user ) {

            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $provider,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => ''
            ]);
        }     
    // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    } 

    //Check for provider allowed and services configured
    private function isProviderAllowed($provider)
    {
        return in_array($provider, $this->providers) && config()->has("services.{$provider}");
    } 

}
