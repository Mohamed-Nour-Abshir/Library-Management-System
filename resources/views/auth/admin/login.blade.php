@extends('layout.front')
@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <form class="form-vertical" action="{{ URL::route('account-sign-in-post') }}" method="POST">
                @csrf
                <div class="module-head">
                    <h3 class="text-warning">Login</h3>
                </div>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="module-body">
                    <div class="control-group">
                    <input class="span8 form-control mb-3" type="email" placeholder="E-mail" name="username" autocomplete="false" value="{{ Request::old('login') }}" /> 
                    @if($errors->has('user_login'))
                        <span class="text-danger"> {{ $errors->first('login')}}</span>
                    @endif
                    <input class="span8 form-control mb-2" type="password" placeholder="Password" name="password" autocomplete="false"/>
                    @if($errors->has('password'))
                        <span class="text-danger">  {{ $errors->first('password')}}</span>
                    @endif	
                </div>
                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix mt-3 mb-3">
                            <button type="submit" class="btn btn-info ps-5 pe-5">Login</button>
                            @csrf
                        </div>
                        {{-- <p style="font-size: 15px; color:black;">New Student <a href="{{route('student.register')}}">Register here?</a></p> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection