<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class GoogleSignUpController extends Controller
{
     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            dd($user);
        } catch (Exception $e) {
            return \Redirect::to('auth/google');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return \Redirect::to('/dashboard');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $googleUser
     * @return User
     */
    private function findOrCreateUser($googleUser)
    {
        if (
            $authUser = User::where('provider_id', $googleUser->id)
                                ->where('provider_name', 'Google')
                                ->first()
        ) {
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'provider_name' => 'google',
            'provider_id' => $googleUser->id,
            'picture' => $googleUser->avatar
        ]);

    }
}
