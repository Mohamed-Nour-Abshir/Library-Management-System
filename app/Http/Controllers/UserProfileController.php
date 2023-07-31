<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    //
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add other validation rules for additional fields if needed
        ]);

        $user->update($request->only('name','username', 'email'));

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
