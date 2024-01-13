<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $settings = Setting::first();
        $user =  User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]);
       
        // Send welcome email
        if(!empty($user->id))
        {
            \App\Jobs\RegisterMailJob::dispatch($data['email'], $data['name']);
        }
        
        $this->redirectTo = '/'; 
       
        return $user;
    }

    public function socialiteLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleData =  Socialite::driver('google')->user();

        $user = User::where('email', $googleData->getEmail())->first();
        if (! $user) {
            // User doesn't exist, create a new user
            $user = User::create([
                'name' => $googleData->getName(),
                'email' => $googleData->getEmail(),
                'password' => Hash::make($googleUser->getName()),
                'role_id'  => 0
            ]);
        }

            // Log in the user
            Auth::login($user);

            // Redirect to the desired page
        return redirect('/');
    }
}
