@extends('layout.front')
@section('content')
@section('card-title')
Teacher Registeration
@endsection
<div class="wrapper">
    <div class="container">
        <div class="row">
            <form class="form-vertical" action="{{ URL::route('student-registration-post') }}" method="POST">
                <div class="module-head">
                    <h3 class="text-dark">Student Registration Form</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">
                        <div class="controls row-fluid">
                            <input class="span6 form-control mb-2" type="text" placeholder="First Name" name="first" value="{{ Request::old('first') }}" /> 
                            <input class="span6 form-control mb-2" type="text" placeholder="Last Name" name="last" value="{{ Request::old('last') }}" /> 
                            
                            @if($errors->has('first'))
                                {{ $errors->first('first')}}
                            @endif
                            @if($errors->has('last'))
                                {{ $errors->first('last')}}
                            @endif
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls row-fluid">
                            <input class="span4 form-control mb-2" type="number" placeholder="Roll number" name="rollnumber" value="{{ Request::old('rollnumber') }}" /> 								
                            <select class="span4 form-control mb-2" style="margin-bottom: 0;" name="branch">
                                <option value="0">select branch</option>
                                {{-- @foreach($branch_list as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
                                @endforeach --}}
                            </select>
                            <input class="span4 form-control mb-2" type="number" placeholder="Year" name="year" value="{{ Request::old('year') }}" /> 

                            @if($errors->has('rollnumber'))
                                {{ $errors->first('rollnumber')}}
                            @endif
                            @if($errors->has('branch'))
                                {{ $errors->first('branch')}}
                            @endif
                            @if($errors->has('year'))
                                {{ $errors->first('year')}}
                            @endif
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls row-fluid">
                            <select class="span4 form-control mb-2" style="margin-bottom: 0;" name="category">
                                <option value="0">select category</option>
                                {{-- @foreach($student_categories_list as $student_category)
                                    <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
                                @endforeach --}}
                            </select>

                            @if($errors->has('email'))
                                {{ $errors->first('email')}}
                            @endif
                            @if($errors->has('category'))
                                {{ $errors->first('category')}}
                            @endif
                        </div>
                    </div>
                    <p class="text-warning mt-4 mb-0">Login Info</p>
                    <input class="span8 form-control mb-2" type="email" placeholder="E-mail" name="email" autocomplete="false" value="{{ Request::old('email') }}" /> 
                    <input class="span8 form-control mb-2" type="password" placeholder="Password" name="password" autocomplete="false" value="{{ Request::old('email') }}" /> 
                    <input class="span8 form-control mb-2" type="password" placeholder="Confirm Password" name="confrimPassword" autocomplete="false" value="{{ Request::old('email') }}" /> 

                </div>
                <div class="module-foot">
                    <div class="control-group">
                        <div class="controls clearfix">
                            <button type="submit" class="btn btn-info pull-right">Register for Library</button>
                            @csrf
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection