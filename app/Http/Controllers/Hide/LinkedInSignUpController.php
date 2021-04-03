<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class LinkedInSignUpController extends Controller
{
     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();
            dd($user);
        } catch (Exception $e) {
            return \Redirect::to('auth/linkedin');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return \Redirect::to('/dashboard');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $linkedInUser
     * @return User
     */
    private function findOrCreateUser($linkedInUser)
    {
        if (
            $authUser = User::where('provider_id', $linkedInUser->id)
                                ->where('provider_name', 'LinkedIn')
                                ->first()
        ) {
            return $authUser;
        }

        return User::create([
            'name' => $linkedInUser->name,
            'email' => $linkedInUser->email,
            'provider_name' => 'LinkedIn',
            'provider_id' => $linkedInUser->id,
            'picture' => $linkedInUser->avatar
        ]);

    }
}
