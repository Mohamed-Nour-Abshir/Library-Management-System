@extends('layout.index')

@section('custom_top_script')
@stop

@section('content')
<div class="content">
    <div class="module">
        <div class="module-head">
            <h3>Edit Books</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid" action="/books/{{ $book->book_id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="control-group">
                    <label class="control-label">Title Of Book</label>
                    <div class="controls">
                        <input type="text" name="title" id="title" class="form-control span8" value="{{ $book->title }}" required>
                        @error('title')<div class="text-warning">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Author Name</label>
                    <div class="controls">
                        <input type="text" name="author" id="author" class="form-control span8" value="{{ $book->author }}" required>
                        @error('author')<div class="text-warning">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Description of Book</label>
                    <div class="controls">
                        <textarea name="description" id="description" class="form-control span8" rows="4" required>{{ $book->description }}</textarea>
                        @error('description')<div class="text-warning">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="basicinput">Category</label>
                    <div class="controls">
                        <select name="category_id" id="category_id" class="form-control span8" required>
                            @foreach($categories_list as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->category }}</option>
                            @endforeach
                        </select>
                        @error('category')<div class="text-warning">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Book Cover Image</label>
                    <div class="controls">
                        <input type="file" name="image" id="image" class="form-control span8"><br>
                        @error('image')<div class="text-warning">{{ $message }}</div>@enderror
                        @if ($book->image)
                            <img src="{{ asset('images/book_covers/' . $book->image) }}" alt="Book Cover" style="max-width: 100px;" class="ml-3">
                        @endif
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Update Book</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
</div>
@stop







