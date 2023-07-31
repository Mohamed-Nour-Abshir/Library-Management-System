<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'profile_image' => '',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.edit')
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
			// Delete old profile_image if it exists
			if ($user->profile_image && Storage::disk('public')->exists('profile_images/' . $user->profile_image)) {
				Storage::disk('public')->delete('profile_images/' . $user->profile_image);
			}
	
			$imageFile = $request->file('profile_image');
			$imageName = time() . '.' . $imageFile->extension();
			$imagePath = $imageFile->storeAs('profile_images', $imageName, 'public');
			$imagePath = str_replace('public/', '', $imagePath);
	
			$user->profile_image = $imageName;
		}
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }
}
