@extends('layout.front')
@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row">
            <form class="form-vertical" action="{{ URL::route('student.registeration') }}" method="POST">
                @csrf
                <div class="module-head">
                    <h3 class="text-dark">Student Registration Form</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">
                        <div class="controls row-fluid">
                            <input class="span6 form-control mt-2" type="text" placeholder="First Name" name="first" value="{{ Request::old('first') }}" />
                            @if($errors->has('first'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('first')}}</span>
                            @endif 
                            <input class="span6 form-control mt-2" type="text" placeholder="Last Name" name="last" value="{{ Request::old('last') }}" /> 
                            @if($errors->has('last'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('last')}}</span>
                            @endif 
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls row-fluid">
                            <input class="span4 form-control mt-2" type="number" placeholder="Registration No" name="rollnumber" value="{{ Request::old('rollnumber') }}" /> 
                            @if($errors->has('rollnumber'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('rollnumber')}}</span>
                            @endif 								
                            <select class="span4 form-control mt-2" style="margin-bottom: 0;" name="branch">
                                <option value="0">select branch</option>
                                @foreach($branch_list as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('branch')}}</span>
                            @endif 
                            <input class="span4 form-control mt-2" type="number" placeholder="Year" name="year" value="{{ Request::old('year') }}" /> 
                            @if($errors->has('year'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('year')}}</span>
                            @endif 
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls row-fluid">
                            <select class="span4 form-control mt-2" style="margin-bottom: 0;" name="category">
                                <option value="0">select department</option>
                                @foreach($student_categories_list as $student_category)
                                    <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('category')}}</span>
                            @endif

                            <input class="span4 form-control mt-2" type="number" placeholder="Phone No" name="phone_no" value="{{ Request::old('phone_no') }}" /> 
                            @if($errors->has('phone_no'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('phone_no')}}</span>
                            @endif 
                            
                            <textarea class="span4 form-control mt-2" placeholder="Student Address" name="address" value="{{ Request::old('address') }}" > Student Address</textarea>
                            @if($errors->has('address'))
                                <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('address')}}</span>
                            @endif 
                        </div>
                    </div>
                    <p class="text-warning mt-4 mb-0">Login Info</p>
                    <input class="span8 form-control mb-2" type="email" placeholder="E-mail" name="email" autocomplete="false" value="{{ Request::old('email') }}" /> 
                    @if($errors->has('email'))
                        <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('email')}}</span>
                    @endif
                    <input class="span8 form-control mb-2" type="password" placeholder="Password" name="password" autocomplete="false" value="{{ Request::old('password') }}" /> 
                    @if($errors->has('password'))
                        <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('password')}}</span>
                    @endif
                    <input class="span8 form-control mb-2" type="password" placeholder="Confirm Password" name="password_again" autocomplete="false" /> 
                    @if($errors->has('password_again'))
                        <span class="text-danger mt-0" style="font-size: 15px; text-align:left;">{{ $errors->first('password_again')}}</span>
                    @endif
                </div>
                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit" class="btn btn-info">Register for Library</button>
                        </div>
                        <p style="font-size: 17px; color:black;" class="mt-2">Already have account <a href="{{route('student.login')}}">Login here?</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection