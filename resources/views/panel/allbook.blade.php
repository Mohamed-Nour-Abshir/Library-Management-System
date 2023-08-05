@extends('layout.base')
@section('custom_top_script')
@stop

@section('content')
<style>
    /* Media query for screens smaller than 768px (tablets and phones) */
@media (max-width: 767px) {
    .span3, .span9 {
        margin-left: 0;
        margin-top: 0;
        width: 100%;
    }
}

/* Media query for screens between 768px and 991px (small desktops and tablets) */
@media (min-width: 768px) and (max-width: 991px) {
    .span3, .span9 {
        margin-left: 0;
        margin-top: 0;
        width: 100%;
    }
}

/* Media query for screens larger than 991px (desktops and larger) */
@media (min-width: 992px) {
    .span3 {
        margin-left: -176px;
        margin-top: -40px;
        width: 25%; /* You can adjust the width to your preference */
        float: left;
    }
    .span9 {
        width: 75%; /* Adjust the width based on the sidebar width */
    }
}
</style>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Books available to Students</h3>
        </div>
        <div class="module-body">
<!--             <p>
                <strong>Combined</strong>
                -
                <small>table class="table table-striped table-bordered table-condensed"</small>
            </p> -->
            <div class="controls">
                <select class="" id="category_fill">
                    @foreach($categories_list as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <table class="table table-striped table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Available</th>
                        <th>Total</th>
                        @auth('admin')
                            <th>Action</th>
                        @endauth
                    </tr>
                </thead>
                <tbody id="all-books">
                    <tr class="text-center">
                        <td colspan="99"> <i class="icon-spinner icon-spin"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" name="" id="categories_list" value="{{ json_encode($categories_list) }}">
</div>
@stop

@section('custom_bottom_script')
<script type="text/javascript">
    var categories_list = $('#categories_list').val();
</script>
<script type="text/javascript" src="{{asset('static/custom/js/script.addbook.js') }}"></script>
<script type="text/template" id="allbooks_show">
    @include('underscore.allbooks_show')
</script>
@stop
