<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
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

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_name' => 'customer',
            'password' => Hash::make($request->password)
        ]);

        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential)) {
            Toastr::success('Login Successfull!!');
            return redirect()->route('profile');
        }
    }

    public function logout()
    {
        Auth::logout();
        Toastr::success('Logout Successfull!!');
        return redirect()->route('home');
    }
}
