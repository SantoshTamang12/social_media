<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Controller\Hash;

class Authcontroller extends Controller
{

    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->intended('home');
        }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register_view()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            // 'password' => 'required|confirmed','min:8',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'


        ]);

        // dd(bcrypt($request->password));

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),

        ]);

        return redirect()->route('login')->with('message', 'Register Successfully!! please Login');
        // return back()->with('message', 'Register Successfully');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
