@extends('account.index')

@section('content')
    <div class="row">
        @foreach ($book_lists as $book_list)
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Book item -->
                <div class="portfolio-item">
                    <a class="portfolio-link" data-bs-toggle="modal" data-bs-target="#bookModal{{ $book_list->book_id }}" href="#bookModal{{ $book_list->book_id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="{{ asset('images/book_covers') }}/{{$book_list->image}}" alt="Book Image" style="width: 1200px; height:240px;" />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $book_list->title }}</div>
                        <div class="portfolio-caption-subheading text-muted">{{ $book_list->category }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Book modals -->
    @foreach ($book_lists as $book_list)
        <div class="portfolio-modal modal fade" id="bookModal{{ $book_list->book_id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal">
                        <img src="assets/img/close-icon.svg" alt="Close modal" />
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Book details -->
                                    <h2 class="text-uppercase">{{ $book_list->title }}</h2>
                                    <p class="item-intro text-muted">{{ Str::limit($book_list->description, 100) }}</p>
                                    <img class="img-fluid d-block mx-auto" src="{{ asset('images/book_covers') }}/{{$book_list->image}}" alt="Book Image" />
									<p>{{$book_list->description}}</p>
									<ul class="list-inline">
                                        <li>
                                            <strong>Author:</strong>
                                            {{ $book_list->author }}
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            {{ $book_list->category }}
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-times me-1"></i>
                                        Close Book
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
