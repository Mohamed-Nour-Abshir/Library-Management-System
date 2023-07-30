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

{{-- <form class="" action="{{ route('books.destroy', $book->book_id) }}" method="POST">
	@csrf
	@method('DELETE')
	<button type="submit" class="btn btn-sm btn-danger btn-delete">
		<i class="icon-trash"></i>
	</button>
</form> --}}

@foreach ($book_list as $book)
	<tr>
		<td>{{$book->book_id}}</td>
		<td>{{$book->title}}</td>
		<td>{{$book->author}}</td>
		<td>{{$book->description}}</td>
		<td><%= obj.category %></td>
		<td><a class="btn btn-success"><%= obj.avaliable %></a></td>
		<td><a class="btn btn-dark"><%= obj.total_books %></a></td>
		<td>
			<button class="btn btn-sm btn-primary btn-edit" data-book-id="<%= obj.book_id %>"><i class="icon-edit text-dark"></i></button>
			<button type="submit" class="btn btn-sm btn-danger btn-delete" data-bs-toggle="modal" data-bs-target="#deleteBook{{$book->book_id}}">
				<i class="icon-trash"></i>
			</button>


			<!-- Modal For Deleting Functionality -->
			<div class="modal fade" id="deleteBook{{$book->book_id}}" tabindex="-1" aria-labelledby="deleteBookLabel" aria-hidden="true">
				<div class="modal-dialog text-light">
				<div class="modal-content">
					<div class="modal-header bg-danger text-light">
					<h5 class="modal-title" id="deleteBookLabel">Delete Books </h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body bg-danger text-light">
					<p>Are sure you want to Delete this ({{$book->title}}) book</p>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<form class="" action="{{ route('books.destroy', $book->book_id) }}" method="POST">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
					</div>
				</div>
				</div>
			</div>


		</td>
	 </tr>

@endforeach




