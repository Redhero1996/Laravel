<?php

namespace App;

use Laravel\Socialite\Contracts\Provider;


class SocialAccountService
{
    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider); 

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

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'image' => $providerUser->getAvatar(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}