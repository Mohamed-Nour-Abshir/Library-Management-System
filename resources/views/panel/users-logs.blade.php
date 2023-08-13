@extends('layout.index')

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            @auth('teacher')
                <h3>My Issued Books</h3>
            @endauth

            @auth('student')
                <h3>My Issued Books</h3>
            @endauth
        </div>
        <div class="module-body">
            <div class="row-fluid">
                @auth('teacher')
                @foreach ($logs->groupBy('student_email') as $teacherEmail => $studentLogs)
                {{-- <h3>Student Email: {{ $studentEmail }}</h3> --}}
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Log ID</th>
                            <th>Book Name</th>
                            <th>User Name</th>
                            <th>Issued On</th>
                            <th>Return Date</th>
                            <th>Read Book</th>                        
                        </tr>
                    </thead>
                    <tbody id="issue-logs-table">
                        @foreach ($studentLogs as $log)
                        <tr>
                            <td>{{ $log['id'] }}</td>
                            <td>{{ $log['book_name'] }}</td>
                            <td>{{ $log['student_name'] }}</td>
                            <td>{{ $log['issued_at'] }}</td>
                            <td>{!! $log['return_time'] !!}</td> {{-- Use {!! !!} to render HTML --}}
                            <td>
                                <a href="{{ $log['book_url'] }}" class="btn btn-inverse" target="_blank">View</a>
                            </td>
                        </tr>
                    @endforeach
                       
                    </tbody>
                </table>
                @endforeach
                @endauth

                @auth('student')
                @foreach ($logs->groupBy('student_email') as $studentEmail => $studentLogs)
                {{-- <h3>Student Email: {{ $studentEmail }}</h3> --}}
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Log ID</th>
                            <th>Book Name</th>
                            <th>User Name</th>
                            <th>Issued On</th>
                            <th>Return Date</th>
                            <th>Read Book</th>                        
                        </tr>
                    </thead>
                    <tbody id="issue-logs-table">
                        @foreach ($studentLogs as $log)
                        <tr>
                            <td>{{ $log['id'] }}</td>
                            <td>{{ $log['book_name'] }}</td>
                            <td>{{ $log['student_name'] }}</td>
                            <td>{{ $log['issued_at'] }}</td>
                            <td>{!! $log['return_time'] !!}</td> {{-- Use {!! !!} to render HTML --}}
                            <td>
                                <a href="{{ $log['book_url'] }}" class="btn btn-inverse" target="_blank">View</a>
                            </td>
                        </tr>
                    @endforeach
                       
                    </tbody>
                </table>
                @endforeach
                @endauth
                
            </div>
        </div>
    </div>
</div>
@stop

