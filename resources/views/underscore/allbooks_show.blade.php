{{-- <tr>
	<td><%= obj.book_id %></td>
	<td><%= obj.title %></td>
	<td><%= obj.author %></td>
	<td><%= obj.description %></td>
	<td><%= obj.category %>
	</td>
	<td><a class="btn btn-success"><%= obj.avaliable %></a></td>
	<td><a class="btn btn-inverse"><%= obj.total_books %></a></td>
	<td>
		<button class="btn btn-sm btn-success btn-edit" data-book-id="<%= obj.book_id %>"><i class="icon-edit text-dark"></i></button>
		<form action="{{route('books.destroy', '<%= obj.book_id %>')}}" method="POST">
			@csrf
			@method('DELETE')
			<input type="hidden" name="book_id" value="<%= obj.book_id %>">
			<a href="#" class="btn btn-sm btn-danger btn-delete" data-book-id="<%= obj.book_id %>"><i class="icon-trash text-dark"></i></a>
		</form>
	</td>
		
</tr> --}}
@foreach ($book_list as $book)
	<tr>
		<td>{{$book->book_id}}</td>
		<td>{{$book->title}}</td>
		<td>{{$book->author}}</td>
		<td>{{$book->description}}</td>
		<td><%= obj.category %></td>
		<td><a class="btn btn-success"><%= obj.avaliable %></a></td>
		<td><a class="btn btn-inverse"><%= obj.total_books %></a></td>
		<td>
			<button class="btn btn-sm btn-primary btn-edit" data-book-id="<%= obj.book_id %>"><i class="icon-edit text-dark"></i></button>
			<form class="" action="{{ route('books.destroy', $book->book_id) }}" method="POST">
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-sm btn-danger btn-delete">
					<i class="icon-trash"></i>
				</button>
			</form>
		</td>
	</tr>
@endforeach




