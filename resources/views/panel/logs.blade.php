@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            @auth('admin')
                <h3>Currently Issued Books</h3>
            @endauth
            @auth('teacher')
                <h3>My Issued Books</h3>
            @endauth
        </div>
        <div class="module-body">
            <div class="row-fluid">
                @auth('admin')
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Log ID</th>
                            <th>Book Issue ID</th>
                            <th>Book Name</th>
                            <th>Request ID</th>
                            <th>User Name</th>
                            <th>Issued On</th>
                            <th>Return Date</th>                        
                        </tr>
                    </thead>
                    <tbody id="issue-logs-table">
                        <tr class="text-center">
                            <td colspan="99">Loading...</td>
                        </tr>
                    </tbody>
                </table>
                <script>
                    var adminurl = "{{ url('/issue-log') }}";
                </script>
                @endauth
                
                @auth('teacher')
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Log ID</th>
                            <th>Book Issue ID</th>
                            <th>Book Name</th>
                            <th>Request ID</th>
                            <th>User Name</th>
                            <th>Issued On</th>
                            <th>Return Date</th>                        
                        </tr>
                    </thead>
                    <tbody id="issue-logs-table">
                        <tr class="text-center">
                            <td colspan="99">Loading...</td>
                        </tr>
                    </tbody>
                </table>
                <script>
                    var teacherurl = "{{ url('/teacher/issue-log') }}";
                </script>
                @endauth
                
            </div>
        </div>
    </div>
</div>
@stop

@section('custom_bottom_script')
<script type="text/javascript" src="{{ asset('static/custom/js/script.logs.js') }}"></script>
<script type="text/template" id="all_logs_display">
    @include('underscore.all_logs_display')
</script>
@stop