@extends('layout.index')

@section('content')
<style>
    .module-head{
        background: green !important;
    }
    .module-head h1{
        color: white !important;
    }
    .module-body img{
        border-radius: 20px;
        margin-bottom: 20px;
    }
    .module-body p{
        font-size: 20px;
        margin-bottom: 20px;
    }
</style>
    <div class="container">
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h1>{{$user->name}}'s Profile</h1>
                </div>
                <div class="module-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($user->profile_image)
                        <img src="{{ asset('images/profile_images/' . $user->profile_image) }}" alt="Profile Image" style="width: 200px; height:200px;">
                    @else
                        <img src="{{ asset('images/profile_images/default-user.jpg') }}" style="width: 200px; height:200px;" />
                    @endif
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->username }}</p>

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>

    </div>
@endsection
