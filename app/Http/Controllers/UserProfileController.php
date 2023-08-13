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
        $teacher = Auth::guard('teacher')->user();
        $student = Auth::guard('student')->user();
        return view('profile.show', compact('user','teacher','student'));
    }

    public function edit()
    {
        $user = Auth::user();
        $teacher = Auth::guard('teacher')->user();
        $student = Auth::guard('student')->user();
        return view('profile.edit', compact('user','teacher','student'));
    }

    public function update(Request $request)
    {
        // $user = Auth::user();
        // $teacher = Auth::guard('teacher')->user();

        // teacher Profile update 
        if (Auth::guard('teacher')->check()) {
            $teacher = Auth::guard('teacher')->user();
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|string|email|max:255|unique:teachers,email,' . $teacher->id,
                'profile_image' => '',
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('teacher.profile.edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            $teacher->first_name = $request->input('first_name');
            $teacher->last_name = $request->input('last_name');
            $teacher->email = $request->input('email');
            if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                // Delete old profile_image if it exists
                if ($teacher->profile_image && Storage::disk('public')->exists('profile_images/' . $teacher->profile_image)) {
                    Storage::disk('public')->delete('profile_images/' . $teacher->profile_image);
                }
        
                $imageFile = $request->file('profile_image');
                $imageName = time() . '.' . $imageFile->extension();
                $imagePath = $imageFile->storeAs('profile_images', $imageName, 'public');
                $imagePath = str_replace('public/', '', $imagePath);
        
                $teacher->profile_image = $imageName;
            }
            $teacher->save();
            return redirect()->route('teacher.profile.show')->with('success', 'Profile updated successfully.');
        }

        // Admin profile update 
        if (Auth::guard('admin')->check()) {
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


        // Student profile update 
        if (Auth::guard('student')->check()) {
            $student = Auth::guard('student')->user();
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|string|email|max:255|unique:members,email,' . $student->id,
                'profile_image' => '',
            ]);
    
            if ($validator->fails()) {
                return redirect()->route('student.profile.edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            $student->first_name = $request->input('first_name');
            $student->last_name = $request->input('last_name');
            $student->email = $request->input('email');
            if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
                // Delete old profile_image if it exists
                if ($student->profile_image && Storage::disk('public')->exists('profile_images/' . $student->profile_image)) {
                    Storage::disk('public')->delete('profile_images/' . $student->profile_image);
                }
        
                $imageFile = $request->file('profile_image');
                $imageName = time() . '.' . $imageFile->extension();
                $imagePath = $imageFile->storeAs('profile_images', $imageName, 'public');
                $imagePath = str_replace('public/', '', $imagePath);
        
                $student->profile_image = $imageName;
            }
            $student->save();
            return redirect()->route('student.profile.show')->with('success', 'Profile updated successfully.');
        }
       
    }
}
