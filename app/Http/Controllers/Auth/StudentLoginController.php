<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;

class StudentLoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::STUDENT_HOME;

    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.student.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

    if (Auth::guard('student')->attempt($credentials)) {
        // Authentication passed, redirect to the intended page.
        // dd(redirect(RouteServiceProvider::STUDENT_HOME));
        return redirect(RouteServiceProvider::STUDENT_HOME);
    } else {
        // dd('Failed to authenticate student.'); // Add this line for debugging
    }

    // Authentication failed, redirect back to the login page with an error message.
    return redirect()->route('student.login')->with('error', 'Invalid login credentials.');
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
