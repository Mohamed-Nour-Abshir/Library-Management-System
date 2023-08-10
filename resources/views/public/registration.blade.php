@extends('layout.index')

@section('content')
<div class="content">
	{{-- <div class="container">
		<div class="row"> --}}
			<div class="module">
				<form class="form-vertical" action="{{ URL::route('student-registration-post') }}" method="POST">
					<div class="module-head">
						<h3>Request Book</h3>
					</div>
					@if(session('global'))
						<div class="alert alert-success">{{ session('global') }}</div>
					@endif
					<div class="module-body">
						<div class="control-group">
							<div class="controls row-fluid">
								<input class="span6" type="text" placeholder="First Name" name="first" readonly value="{{ auth()->guard('teacher')->user()->first_name }}" /> 
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
								<input class="span4" type="email" placeholder="E-mail" name="email" autocomplete="false" readonly value="{{ auth()->guard('teacher')->user()->email }}" /> 
								<input class="span4" type="number" placeholder="Roll number" name="rollnumber" readonly value="{{ auth()->guard('teacher')->user()->id_num }}" /> 								
								{{-- <select class="span4" style="margin-bottom: 0;" name="branch">
									<option value="0">select branch</option>
									@foreach($branch_list as $branch)
				                        <option value="{{ $branch->id }}">{{ $branch->branch }}</option>
				                    @endforeach
								</select> --}}
								<input type="hidden" name="branch" value="{{auth()->guard('teacher')->user()->branch }}">
								<input class="span4" type="number" placeholder="Year" name="year" value="{{auth()->guard('teacher')->user()->year }}" readonly /> 
								@if($errors->has('email'))
									{{ $errors->first('email')}}
								@endif
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
								<select class="span12" style="margin-bottom: 0;" name="book_name">
									<option value="0">select Book</option>
									@foreach($book_list as $book)
				                        <option value="{{ $book->title }}">{{ $book->title }}</option>
				                    @endforeach
								</select>
								<input type="hidden" name="category" value="{{auth()->guard('teacher')->user()->category }}">

								@if($errors->has('book_name'))
									{{ $errors->first('book_name')}}
								@endif
								@if($errors->has('category'))
									{{ $errors->first('category')}}
								@endif
							</div>
						</div>
					</div>
					<div class="module-foot">
						<div class="control-group">
							<div class="controls clearfix">
								<button type="submit" class="btn btn-info pull-right">Send Request</button>
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
