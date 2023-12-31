<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function index()
    {
        return view('backend/login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) 
        {
            $request->session()->regenerate();
            return redirect()->route('perusahaan.index');
        } else {
            return redirect()->route('login.index')
                ->with('error','Email atau Password Salah');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
    
}
