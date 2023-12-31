<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showForm()
    {
        return view('profile.change-password');
    }

    public function changePassword(Request $request)
    {
        if(Auth::guard('teacher')->check()){
             $teacher = Auth::guard('teacher')->user();
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|string|min:8|confirmed',
            ]);

            if (!Hash::check($request->input('current_password'), $teacher->password)) {
                return redirect()->route('teacher.password.change')->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            $teacher->update([
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect()->route('teacher.profile.show')->with('success', 'Password changed successfully.');
        }
        else if(Auth::guard('admin')->check()){
            $user = Auth::user();
            $request->validate([
                'current_password' => 'required',
                'password' => 'required|string|min:8|confirmed',
            ]);

            if (!Hash::check($request->input('current_password'), $user->password)) {
                return redirect()->route('password.change')->withErrors(['current_password' => 'The current password is incorrect.']);
            }

            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
            return redirect()->route('profile.show')->with('success', 'Password changed successfully.');
        }


        
    }
}

