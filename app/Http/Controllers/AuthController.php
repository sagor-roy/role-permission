<?php

namespace App\Http\Controllers;

use App\Models\Creadential;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Socialite;

class AuthController extends Controller
{
    public function __construct()
    {
        $google = Creadential::find(2);
        Config::set('services.google.client_id', $google->client_id);
        Config::set('services.google.client_secret', $google->secret_id);
        Config::set('services.google.redirect', $google->redirect);
        $facebook = Creadential::find(1);
        Config::set('services.facebook.client_id', $facebook->client_id);
        Config::set('services.facebook.client_secret', $facebook->secret_id);
        Config::set('services.facebook.redirect', $facebook->redirect);
        $github = Creadential::find(3);
        Config::set('services.github.client_id', $github->client_id);
        Config::set('services.github.client_secret', $github->secret_id);
        Config::set('services.github.redirect', $github->redirect);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            if (Auth::user()->role_name == 'customer') {
                Toastr::success('Login Successfull!!');
                return redirect()->route('profile');
            }
            Toastr::success('Login Successfull!!');
            return redirect()->route('dashboard');
        }
        Toastr::error('Creadential does\'t match our record');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $login = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_name' => 'customer',
            'password' => Hash::make($request->password)
        ]);

        Auth::login($login);
        Toastr::success('Login Successfull!!');
        return redirect()->route('profile');
    }

    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout Successfull!!');
        return redirect()->route('home');
    }

    //login with google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallbackGithub()
    {
        $user = Socialite::driver('github')->user();
        $findUser = User::where('social_id', $user->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('profile');
        } else {
            if (User::where('email', $user->email)->first()) {
                Toastr::error('Your email has been already registered on another account');
                return redirect()->route('login');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_name' => 'customer',
                    'social_id' => $user->id,
                    'password' => Hash::make('000000')
                ]);
                Auth::login($newUser);
                return redirect()->route('profile');
            }
        }
    }

    public function handleCallback()
    {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('social_id', $user->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('profile');
        } else {
            if (User::where('email', $user->email)->first()) {
                Toastr::error('Your email has been already registered on another account');
                return redirect()->route('login');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_name' => 'customer',
                    'social_id' => $user->id,
                    'password' => Hash::make('000000')
                ]);
                Auth::login($newUser);
                return redirect()->route('profile');
            }
        }
    }

    public function handleCallbackFacebook()
    {
        $user = Socialite::driver('facebook')->user();
        $findUser = User::where('social_id', $user->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('profile');
        } else {
            if (User::where('email', $user->email)->first()) {
                Toastr::error('Your email has been already registered on another account');
                return redirect()->route('login');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_name' => 'customer',
                    'social_id' => $user->id,
                    'password' => Hash::make('000000')
                ]);
                Auth::login($newUser);
                return redirect()->route('profile');
            }
        }
    }
}
