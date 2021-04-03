<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Http\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class FacebookSignUpController extends Controller
{
     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            dd($user);
        } catch (Exception $e) {
            return \Redirect::to('auth/facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return \Redirect::to('/dashboard');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        if (
            $authUser = User::where('provider_id', $facebookUser->id)
                                ->where('provider_name', 'Facebook')
                                ->first()
        ) {
            return $authUser;
        }

        return User::create([
            'name' => $facebookUser->name,
            'email' => $facebookUser->email,
            'provider_name' => 'Facebook',
            'provider_id' => $facebookUser->id,
            'picture' => $facebookUser->avatar
        ]);

    }
}
