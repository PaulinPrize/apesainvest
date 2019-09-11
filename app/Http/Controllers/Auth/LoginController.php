<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;
use App\User;
use Socialite;
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

    use \BeyondCode\EmailConfirmation\Traits\AuthenticatesUsers;
        
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'user/tableau-de-bord';
    protected $maxAttempts = 3;
    protected $decayMinutes = 2;

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
     * Rediriger l'utilisateur vers la page d'authentification de Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }   

    /**
     * Obtenir les informations utilisateur de Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookCallback()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        $user = User::where('provider_id', $facebookUser->getId())->first();

        if(!$user){
            // Ajouter l'utilisateur à la base de données
            $user = User::create([
                'email' => $facebookUser->getEmail(),
                'name' => $facebookUser->getName(),
                'provider_id' => $facebookUser->getId(),
                'photo' => 'images.png',
                'password' => bcrypt('1234'),
            ]);
        }
  
        // Connecter l'utilisateur
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    // Rediriger l'utilisateur vers la page d'authentification de GitHub
    public function redirectToLinkedin(){
        return Socialite::driver('linkedin')->redirect();
    }

    // Obtenir les informations utilisateur de GitHub
    public function handleLinkedinCallback()
    {
        $linkedinUser = Socialite::driver('linkedin')->user();

        $user = User::where('provider_id', $linkedinUser->getId())->first();
        if(!$user){
            // Ajouter l'utilisateur à la base de données
            $user = User::create([
                'email' => $linkedinUser->getEmail(),
                'name' => $linkedinUser->getName(),
                'provider_id' => $linkedinUser->getId(),
                'photo' => 'images.png',
                'password' => bcrypt('1234'),
            ]);
        }

        // Connecter l'utilisateur
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    // Rediriger l'utilisateur vers la page d'authentification de Google
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    // Obtenir les informations utilisateur de Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('provider_id', $googleUser->getId())->first();
        if(!$user){
            // Ajouter l'utilisateur à la base de données
            $user = User::create([
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
                'provider_id' => $googleUser->getId(),
                'photo' => 'images.png',
                'password' => bcrypt('1234'),
            ]);
        }
        // Connecter l'utilisateur
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
