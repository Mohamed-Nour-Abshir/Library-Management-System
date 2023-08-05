@extends('layout.index')

@section('content')

<div class="content">
    <div class="module">
        <div class="module-head bg-primary">
            <h3>Students Information</h3>
        </div>
        <div class="module-body">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>user ID</th>
                        <th>user Name</th>
                        <th>User Email</th>
                        <th>User Type</th>
                        <th>Book Name</th>
                        {{-- <th>Branch</th>
                        <th>Teacher Department</th> --}}
                    </tr>
                </thead>
                <tbody id="">
                    @foreach ($bookRequests as $bookRequest)
                        <tr class="text-center">
                            <td>{{$bookRequest->id_num}}</td>
                            <td>{{$bookRequest->name}}</td>
                            <td>{{$bookRequest->email}}</td>
                            <td>{{$bookRequest->user_type}}</td>
                            <td>{{$bookRequest->book_name}}</td>
                            {{-- <td>{{$teacher->branch}}</td>
                            <td>{{$teacher->category}}</td> --}}
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop

@section('custom_bottom_script')
@stop
