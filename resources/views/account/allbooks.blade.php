<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DIU - Library Management System</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <style>
            #mainNav {
                padding-top: 1rem;
                padding-bottom: 1rem;
                background-color: #212529 !important;
            }
        </style>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="/" style="font-style: italic;">DIU - Library</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="/">Books</a></li>
                        <li class="nav-item"><a class="nav-link" href="/">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/">Team</a></li>
                        <li class="nav-item">
                            <ul class="ms-5">
                                <li class="nav-item dropdown dropdown-menu-enddropdown-menu-right">
                                    <a class="nav-link dropdown-toggle btn btn-success ps-5 pe-5 ms-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Login
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('teacher.login')}}">Teacher Login</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('student.login')}}">Student Login</a>
                                    </div>
                                </li>
                            </ul>
                        </li>    
                    </ul>
                </div>
            </div>
        </nav>

        <!-- BOOKS Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Books</h2>
                    <h3 class="section-subheading text-muted">Find all the books in the library by searching Name or Autrher of the book.</h3>
                </div>
               <form action="{{ route('allbooks') }}" method="GET">
                    <div class="input-group mb-5 container d-flex justify-content-center  w-50">
                        <input type="text" name="search" class="form-control w-50" placeholder="Search" aria-label="Name or author of the book" aria-describedby="button-addon2">
                        <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
                    </div>
               </form>
                <div class="row">
                    @if(count($book_lists) > 0)
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
                    @else
                    <p class="text-center p-3 bg-primary">No Books Found!</p>
                    @endif
                </div>
            </div>

        </section>

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
        
        <!-- Footer-->
        <footer class="footer py-4 bg-dark text-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; DIU - Library 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <p>DIU - Library Management System</p>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-white text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-white text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Login modal popup-->
        <div class="portfolio-modal modal fade" id="loginForm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="module-head">
                                <h3>Librarian / Admin Sign In</h3>
                            </div>
                            <div class="col-lg-4">
                                <div class="modal-body">
                                    <!-- Login form-->
                                    <div class="wrapper">
                                        <div class="container">
                                            <div class="row">
                                                <div class="module module-login span4 offset1">
                                                    <form class="form-vertical" action="{{ URL::route('account-sign-in-post') }}" method="POST">
                                                        @csrf
                                                        <div class="module-body">
                                                            <div class="control-group">
                                                                <div class="controls row-fluid">
                                                                    <input class="span12 form-control mb-2" type="text" name="username" placeholder="Username" value="{{ Request::old('login') }}" autofocus>
                                                                    @if($errors->has('user_login'))
                                                                    <span class="text-danger"> {{ $errors->first('login')}}</span>
                                                                    @endif									
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <div class="controls row-fluid">
                                                                    <input class="span12 form-control mb-2" type="password" name="password" placeholder="Password">
                                                                    @if($errors->has('password'))
                                                                    <span class="text-danger">  {{ $errors->first('password')}}</span>
                                                                    @endif									
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="module-foot">
                                                            <div class="control-group mb-3">
                                                                <div class="controls d-flex justify-content-between">
                                                                    <label class="checkbox">
                                                                        <input type="checkbox" name="remember" id="remember"> Remember me
                                                                    </label>
                                                                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                                                                </div>
                                                            </div>
                                                            {{-- <a href="{{ URL::route('account-create') }}">New librarian? Sign Up</a> --}}
                                                            <a data-bs-toggle="modal" href="#signUpForm">New librarian? Sign Up</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Signup modal popup-->
        <div class="portfolio-modal modal fade" id="signUpForm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="module-head">
                                <h3>Librarian / Admin Sign Up</h3>
                            </div>
                            <div class="col-lg-4">
                                <div class="modal-body">
                                    <!-- Signup form-->

                                    <div class="wrapper">
                                        <div class="container">
                                            <div class="row">
                                                <div class="module module-login span4 offset4">
                                                    <form class="form-vertical" action="{{ URL::route('account-create-post') }}" method="POST">
                                                        @csrf
                                                        <div class="module-body">
                                                            <div class="control-group">
                                                                <div class="controls row-fluid">
                                                                    <input class="span12 form-control mb-2" type="text" placeholder="Email" name="username" value="{{ Request::old('login') }}"> 
                                                                    @if($errors->has('login'))
                                                                    <span class="text-danger"> {{ $errors->first('login')}}</span>
                                                                    @endif								
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <div class="controls row-fluid">
                                                                    <input class="span12 form-control mb-2" type="password" name="password" placeholder="Password">
                                                                    @if($errors->has('password'))
                                                                        <span class="text-danger">{{ $errors->first('password')}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="control-group">
                                                                <div class="controls row-fluid">
                                                                    <input class="span12 form-control mb-2" type="password" name="password_again" placeholder="Confirm Password">
                                                                    @if($errors->has('password_again'))
                                                                        <span class="text-danger">{{ $errors->first('password_again')}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="module-foot">
                                                            <div class="control-group mb-2">
                                                                <div class="controls clearfix">
                                                                    <button type="submit" class="btn btn-info pull-right">Create Account</button>
                                                                </div>
                                                            </div>
                                                            <a data-bs-toggle="modal" href="#loginForm">Already A User?</a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="{{ asset('static/custom/js/script.common.js') }}" type="text/javascript"></script>
        @include('common.script_bottom')
        <script type="text/template" id="alert_box">
            @include('underscore.alert_box')
        
        
        </script>
        
        <script>
                $(document).ready(function(){ 
                $("input").attr("autocomplete", "off");
            });
        </script>
    </body>
</html>
