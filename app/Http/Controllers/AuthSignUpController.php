<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthSignUpController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        switch ($provider) {
            case 'linkedin':
                 return Socialite::driver($provider)->redirect();
                break;
            
            default:
                return Socialite::driver($provider)->redirect();
                break;
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
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return \Redirect::to('auth/' . $provider);
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return \Redirect::to('/dashboard');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($user, $provider)
    {
        if ($authUser = User::where('provider_id', $user->id)
                                ->where('provider_name', ucfirst($provider))
                                ->first()
            ) {
            return $authUser;
        }

        return User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'provider_name' => ucfirst($provider),
            'provider_id' => $user->getId(),
            'picture' => $user->getAvatar(),
        ]);
    }
}
