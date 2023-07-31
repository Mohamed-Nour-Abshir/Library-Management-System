@extends('layout.index')

@section('content')
<style>
    .module-head{
        background: rgb(2, 2, 140) !important;
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
                    <h1>Change Password</h1>
                </div>
                <div class="module-body">
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
            
                        <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
            
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
            
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
