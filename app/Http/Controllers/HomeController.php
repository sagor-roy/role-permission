<?php

namespace App\Http\Controllers;

use App\Models\Creadential;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }
    public function loginIndex()
    {
        return view('frontend.auth.login');
    }
    public function register()
    {
        return view('frontend.auth.register');
    }
    public function dashboard()
    {
        return view('backend.dashboard');
    }
    public function credentIndex()
    {
        $facebook=Creadential::find(1);
        $google=Creadential::find(2);
        $github=Creadential::find(3);
        return view('backend.credential',compact('facebook','google','github'));
    }
    public function profile()
    {
        if (Auth::user()->role_name == 'customer') {
            return view('frontend.user.profile');
        }
        return redirect()->back();
    }
    public function about()
    {
        return view('backend.about');
    }
    public function contact()
    {
        return view('backend.contact');
    }
    public function role()
    {
        $data = Role::get();
        return view('backend.role', compact('data'));
    }
    public function roleStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        $create = new Role();
        $input = $request->all();

        if (!empty($request->section)) {
            $input['section'] = implode(" , ", $request->section);
        } else {
            $input['section'] = '';
        }
        $create->fill($input)->save();
        Toastr::success('Data created successful');
        return redirect()->back();
    }

    public function staff()
    {
        $data = User::where('role_id', '!=', 0)->with('role')->get();
        $role = Role::get();
        return view('backend.staff', compact('data', 'role'));
    }

    public function staffStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors(Toastr::error($validator->errors()->all()[0]))->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role,
            'role_name' => 'sub',
            'password' => Hash::make($request->password),
        ]);
        Toastr::success('Data created successful');
        return redirect()->back();
    }

    public function student()
    {
        $data['item'] = Student::get();
        $pdf = PDF::loadView('frontend.invoice', $data);
        return $pdf->stream('invoice.pdf');
    }
}
