<?php

    namespace App\Http\Controllers\Auth;

    use App\User;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Laravel\Socialite\Facades\Socialite;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Contracts\Auth\Authenticatable;



    class AuthenticationController extends Controller
    {
        public function getApp(){
            return view('web.app');
        }

        public function getLogin()
        {
            return view('web.login');
        }

        public function getSocialRedirect($account){
            try{
                return Socialite::with( $account )->redirect();
            }catch ( \InvalidArgumentException $e ){
                echo ('catch');
                return redirect('/login');
            }
        }
        public function getSocialCallback( $account ){
            /*
              Grabs the user who authenticated via social account.
            */
            $socialUser = Socialite::with( $account )->user();

            /*
                  Gets the user in our database where the provider ID
                  returned matches a user we have stored.
            */
ddd($socialUser);
            $user = User::where( 'provider_id', '=', $socialUser->id )
                ->where( 'provider', '=', $account )
                ->first();
            /*
              Checks to see if a user exists. If not we need to create the
              user in the database before logging them in.
            */
            if( $user == null ){
                $newUser = new User();

                $newUser->name        = $socialUser->getName();
                $newUser->email       = $socialUser->getEmail() == '' ? '' : $socialUser->getEmail();
                $newUser->avatar      = $socialUser->getAvatar();
                $newUser->password    = '';
                $newUser->provider    = $account;
                $newUser->provider_id = $socialUser->getId();

                $newUser->save();

                $user = $newUser;
            }
            /*
              Log in the user
            */
            ddd($user);
//            Auth::login($user);

            /*
              Redirect to the app
            */
//            return redirect('/');
        }
    }
