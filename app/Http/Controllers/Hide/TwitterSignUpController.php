<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class TwitterSignUpController extends Controller
{
     /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->stateless()->user();
            dd($user);
        } catch (Exception $e) {
            return \Redirect::to('auth/twitter');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return \Redirect::to('/dashboard');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $twitterUser
     * @return User
     */
    private function findOrCreateUser($twitterUser)
    {
        if (
            $authUser = User::where('provider_id', $twitterUser->id)
                                ->where('provider_name', 'Twitter')
                                ->first()
        ) {
            return $authUser;
        }

        return User::create([
            'name' => $twitterUser->name,
            'email' => $twitterUser->email,
            'provider_name' => 'twitter',
            'provider_id' => $twitterUser->id,
            'picture' => $twitterUser->avatar
        ]);

    }
}
