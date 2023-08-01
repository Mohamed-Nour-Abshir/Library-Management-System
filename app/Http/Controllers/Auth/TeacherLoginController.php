<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherLoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.teacher.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('teacher')->attempt($credentials)) {
            // Authentication passed, redirect to the intended page.
            return redirect()->intended($this->redirectTo);
        }

        // Authentication failed, redirect back to the login page with an error message.
        return redirect()->route('teacher.login')->with('error', 'Invalid login credentials.');
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/');
    }
}
