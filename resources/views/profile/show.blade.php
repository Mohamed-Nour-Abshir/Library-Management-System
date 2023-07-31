@extends('layout.index')

@section('content')
    <div class="container">
        <h1>User Profile</h1>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    </div>
@endsection
