@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            @auth('admin')
                
                <div class="d-flex justify-content-between">
                    <h3>Currently Issued Books</h3> 
                </div>
                
            @endauth
            @auth('teacher')
                <h3>My Issued Books</h3>
            @endauth
        </div>
        <div class="module-body">
            <div class="row-fluid">
                @auth('admin')
                <div class="module">
                    <div class="module-body">
                        <form class="form-horizontal row-fluid" id="findstudentform">
                            <div class="control-group">
                                <label class="control-label">Enter Book Request ID</label>
                                <div class="controls">
                                    <input type="text" placeholder="" class="span9">
                                    <a class="btn homepage-form-submit" style="background-color:  #00cc00; color:#fff"><i class="icon-search"></i> Search</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="module-body" id="module-body-results"></div>
                </div>

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
<script type="text/javascript" src="{{asset('static/custom/js/script.mainpage.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/custom/js/script.logs.js') }}"></script>
<script type="text/template" id="all_logs_display">
    @include('underscore.all_logs_display')
</script>
<script type="text/template" id="search_student">
    @include('underscore.search_student')
</script>
<script type="text/template" id="approvalstudents_show">
    @include('underscore.approvalstudents_show')
</script>
@stop