@extends('layout.index')

@section('content')
    <div class="container">
        <h1>User Profile</h1>
        @if($user->profile_image)
            <img src="{{ asset('images/profile_images/' . $user->profile_image) }}" alt="Profile Image" width="200">
        @endif
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
@endsection
