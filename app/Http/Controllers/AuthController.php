<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('adminDashboard');
        }
        return view('AdminPanel.login');
    }

    public function handleLogin(Request $request)
    {

        $email = $request->email;
        $password = $request->password;

        $data = ['email' => $email, 'password' => $password];
        if (Auth::attempt($data)) {
            // Success redirect
            return redirect()->intended(route('adminDashboard'));
        }

        return redirect()->back()
            ->with('status', 'login_error')
            ->with('message', "Email Or Password Wrong");
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect()->route('adminLogin');
    }
}
