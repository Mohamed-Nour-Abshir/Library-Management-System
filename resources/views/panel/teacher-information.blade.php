@extends('layout.index')

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Teachers Information</h3>
        </div>
        <div class="module-body">
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Teacher ID</th>
                        <th>Teacher First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        {{-- <th>Branch</th>
                        <th>Teacher Department</th> --}}
                    </tr>
                </thead>
                <tbody id="">
                    @foreach ($teachers as $teacher)
                        <tr class="text-center">
                            <td>{{$teacher->id_num}}</td>
                            <td>{{$teacher->first_name}}</td>
                            <td>{{$teacher->last_name}}</td>
                            <td>{{$teacher->email}}</td>
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
