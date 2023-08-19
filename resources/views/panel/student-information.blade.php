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
                        <th>Sl. No</th>
                        <th>Student First Name</th>
                        <th>Last Name</th>
                        <th>Reg No.</th>
                        <th>Email</th>
                        <th>Phone No.</th>
                        <th>Address</th>
                        {{-- <th>Branch</th>
                        <th>Teacher Department</th> --}}
                    </tr>
                </thead>
                <tbody id="">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($students as $student)
                        <tr class="text-center">
                            <td>{{++ $i}}</td>
                            <td>{{$student->first_name}}</td>
                            <td>{{$student->last_name}}</td>
                            <td>{{$student->roll_num}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone_no}}</td>
                            <td>{{$student->address}}</td>
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
