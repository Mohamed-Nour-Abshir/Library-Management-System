@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Request Book</h3>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="module-body">
            <form class="form-horizontal row-fluid" method="POST" action="{{route('teacher.request-book-post')}}">
                @csrf
                <div class="control-group">
                    <label class="control-label">Book Name</label>
                    <div class="controls">
                        <select name="book_name" id="" class="span8 form-control">
                            @foreach ($books as $book)
                                <option value="{{$book->title}}">{{$book->title}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Teacher ID</label>
                    <div class="controls">
                        <input type="text" name="id_num" class="span8" value="{{auth()->guard('teacher')->user()->id_num}}" readonly>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Teacher Name</label>
                    <div class="controls">
                        <input type="text" name="name" class="span8" value="{{auth()->guard('teacher')->user()->first_name}}" readonly>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Teacher Email</label>
                    <div class="controls">
                        <input type="text" name="email"   class="span8" value="{{auth()->guard('teacher')->user()->email}}" readonly>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-primary" id="addbookcategory">Request Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@stop