@extends('layout.index')

@section('content')
<style>
    .module{
        padding-bottom: 10px;
    }
    .module-head{
        background: green !important;
    }
    .module-head h1{
        color: white !important;
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
                    <h1>Edit Profile</h1>
                </div>
                <div class="module-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
            
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('username', $user->username) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="profile_image">Profile Image</label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control-file">
                            @error('profile_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br>
                        @if($user->profile_image)
                            <img src="{{ asset('images/profile_images/' . $user->profile_image) }}" alt="Profile Image" style="width: 100px; height:100px;">
                        @else
                            <img src="{{ asset('images/profile_images/default-user.jpg') }}" style="width: 100px; height:100px;" />
                        @endif
                        <br>
            
                        <!-- Add other fields you want to edit here -->
            
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection