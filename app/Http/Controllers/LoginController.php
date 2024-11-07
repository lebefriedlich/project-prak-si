<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.'
        ];

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], $messages);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        return redirect('/')->with('error', 'Username atau password salah.')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
