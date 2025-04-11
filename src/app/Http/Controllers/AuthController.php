<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
    
    public function login()
    {

        return view('auth/login');
    }

    public function create(RegisterRequest $request)
    {
        $users = $request->only('name', 'email', 'password');
        User::create($users);
        return view('auth/login');
    }

    public function admin(LoginRequest $request)
    {
        $users = $request->only('email', 'password');
        if (Auth::attempt($users)) {

            $request->session()->regenerate();

            return redirect()->route('admin.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        
    }
    public function index()
    {
    
        return view('auth/admin');
    }

}
