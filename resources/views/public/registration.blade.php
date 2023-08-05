@extends('layout.index')
@section('content')

<div class="content">
	{{-- <div class="container"> --}}
		{{-- <div class="row"> --}}
			<div class="module">
				<form class="form-vertical" action="{{ URL::route('student-registration-post') }}" method="POST">
					<div class="module-head">
						<h3>Request Book</h3>
					</div>
					@if(session('success'))
						<div class="alert alert-success">{{ session('success') }}</div>
					@endif
					<div class="module-body">
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span6" type="text" placeholder="First Name" name="first" readonly value="{{ auth()->guard('teacher')->user()->first_name }}"  /> 
								<input class="span6" type="text" placeholder="Last Name" name="last" readonly value="{{ auth()->guard('teacher')->user()->last_name }}" /> 
								
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
								<input class="span4" type="number" placeholder="Roll number" readonly name="rollnumber" value="{{ auth()->guard('teacher')->user()->id_num }}" /> 								
								{{-- <select class="span4" style="margin-bottom: 0;" name="category">
									<option value="0">select Department</option>
									@foreach($student_categories_list as $student_category)
				                        <option value="{{ $student_category->cat_id }}">{{ $student_category->category }}</option>
				                    @endforeach
								</select> --}}
								<input class="span4" type="text" placeholder="Department" readonly name="category" value="{{auth()->guard('teacher')->user()->category }}" /> 
								<input class="span4" type="number" placeholder="Year" readonly name="year" value="{{auth()->guard('teacher')->user()->year }}" /> 

								@if($errors->has('rollnumber'))
									{{ $errors->first('rollnumber')}}
								@endif
								@if($errors->has('category'))
									{{ $errors->first('category')}}
								@endif
								@if($errors->has('year'))
									{{ $errors->first('year')}}
								@endif
								
							</div>
						</div>
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span8" type="email" placeholder="E-mail" readonly name="email" autocomplete="false" value="{{ auth()->guard('teacher')->user()->email }}" /> 
								<select class="span4" style="margin-bottom: 0;" name="branch">
									<option value="0">select Book</option>
									@foreach($book_list as $branch)
				                        <option value="{{ $branch->book_id }}">{{ $branch->title }}</option>
				                    @endforeach
								</select>
								@if($errors->has('email'))
									{{ $errors->first('email')}}
								@endif
								@if($errors->has('branch'))
									{{ $errors->first('branch')}}
								@endif
							</div>
						</div>
					</div>
					<div class="module-foot">
						<div class="control-group">
							<div class="controls clearfix">
								<button type="submit" class="btn btn-primary pull-right">Send Request</button>
								@csrf
							</div>
						</div>
						{{-- <a href="{{ URL::route('account-sign-in') }}">Go Back!</a> --}}
					</div>
				</form>
			</div>
		{{-- </div> --}}
	{{-- </div> --}}
</div>

{{-- @include('account.style') --}}

@stop
