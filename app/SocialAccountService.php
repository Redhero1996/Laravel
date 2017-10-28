<?php
 // k cần dùng model này nữa
namespace App;

use Laravel\Socialite\Contracts\Provider;

class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider); 

         // $fileContents = file_get_contents($providerUser->getAvatar());
         // File::put(public_path() . '/upload/users/'.$providerUser->getId(), $fileContents);

        $account = Social::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();



        if ($account) {
            return $account->user;
        } else {

            $account = new Social([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName,
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                 // $fileContents = file_get_contents($providerUser->getAvatar());   
                 // $avatar = File::put(public_path().'upload/users/'.$providerUser->getId().'.jpg', $fileContents);
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'avatar' => $providerUser->getAvatar(),
                    'password' => '',
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}