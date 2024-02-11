<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('register');
    }


    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        session(['user' => $user]);

        return redirect()->route('login');
    }


    public function showLogin()
    {
        return view('login');
    }


    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);


        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            session(['user' => $user]);

            return redirect()->route('reservations');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }


    public function logout(Request $request)
    {

        $request->session()->forget('user');

        return redirect()->route('show');
    }
}
