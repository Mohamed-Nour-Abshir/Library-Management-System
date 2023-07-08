@if(Session::has('global'))
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>OOPS!</strong> {{ Session::get('global') }}.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
		</div>
	</div>
@endif





{{-- <div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ Session::get('global') }}
</div> --}}