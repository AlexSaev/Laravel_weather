<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class ProvidersController extends Controller
{
    /**
     **_ Redirect the user to the OAuth Provider.
    _**
     **_ @return Response
    _**/
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
    _ Obtain the user information from provider.  Check if the user already exists in our
    _ database by looking up their provider_id in the database.
    _ If the user exists, log them in. Otherwise, create a new user then log them in. After that
    _ redirect them to the authenticated users homepage.
    _
    _ @return Response
    _**/
    public function handleProviderCallback($provider)
    {
    $user = Socialite::driver($provider)->user();

//    $authUser = $this->findOrCreateUser($user, $provider);
    Auth::login($user);
//    return redirect($this->redirectTo('home'));
        return view('pupa_lupa');
    }

    /**
    _ If a user has registered before using social auth, return the user
    _ else, create a new user object.
    _ @param  $user Socialite user object
    _ @param $provider Social auth provider
    _ @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
