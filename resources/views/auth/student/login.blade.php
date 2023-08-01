@extends('layout.front')
@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <form class="form-vertical" action="{{ URL::route('student-registration-post') }}" method="POST">
                <div class="module-head">
                    <h3 class="text-warning">Login as a student</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">
                    <input class="span8 form-control mb-3" type="email" placeholder="E-mail" name="email" autocomplete="false" value="{{ Request::old('email') }}" /> 
                    <input class="span8 form-control mb-2" type="password" placeholder="Password" name="password" autocomplete="false" value="{{ Request::old('email') }}" /> 
                </div>
                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit" class="btn btn-info pull-right">Login</button>
                            @csrf
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection