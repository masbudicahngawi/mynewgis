<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $rekues)
    {
        $data = $rekues->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $rekues->session()->regenerate();

            return redirect('/poi');
        }

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}