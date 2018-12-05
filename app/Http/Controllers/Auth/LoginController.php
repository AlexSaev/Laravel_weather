<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

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

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
//        return Socialite::with($provider)->redirect();
        return Socialite::with($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    // Так, потом нужно убрать весь этот хардкод к чертовой матери.
    public function handleProviderCallback($provider)
    {
        $user = Socialite::with($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser);

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->getId())->first();
        if ($authUser) {
            return $authUser;
        }
        if ($provider == 'vkontakte')
        {
            return User::create([
                'email' => $user->accessTokenResponseBody['email'],
                'name' => $user->getName(),
                'provider_id' => $user->getId(),
                'provider' => $provider,
            ]);
        }
        elseif ($provider == 'github')
        {
            return User::create([
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'provider_id' => $user->getId(),
                'provider' => $provider,
            ]);
        }

    }
}
