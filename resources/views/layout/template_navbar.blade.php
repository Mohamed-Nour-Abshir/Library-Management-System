<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a>
                <a class="brand" href="" style="color:#fff;">DIU Library</a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav pull-right">
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @auth('admin')
                            @if(auth()->guard('admin')->user()->profile_image)
                                <img src="{{ asset('images/profile_images/' . auth()->guard('admin')->user()->profile_image) }}" alt="Profile Image" class="nav-avatar">
                            @else
                                <img src="{{ asset('images/profile_images/default-user.jpg') }}" class="nav-avatar" />
                            @endif
                            @if(auth()->guard('admin')->user()->name)
                                {{ auth()->guard('admin')->user()->name }}
                            @else
                                Hi
                            @endif
                        @endauth

                        @auth('teacher')
                            @if(auth()->guard('teacher')->user()->profile_image)
                                <img src="{{ asset('images/profile_images/' . auth()->guard('teacher')->user()->profile_image) }}" alt="Profile Image" class="nav-avatar">
                            @else
                                <img src="{{ asset('images/profile_images/default-user.jpg') }}" class="nav-avatar" />
                            @endif
                            @if(auth()->guard('teacher')->user()->first_name)
                                {{ auth()->guard('teacher')->user()->first_name }}
                            @else
                                Hi
                            @endif

                        @endauth
                        
                        <b class="caret"></b></a>
                        @auth('admin')
                            <ul class="dropdown-menu">
                                <li><a href="{{route('profile.show')}}">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{route('password.change')}}">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                            </ul>
                        @endauth
                        @auth('teacher')
                            <ul class="dropdown-menu">
                                <li><a href="{{route('teacher.profile.show')}}">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{route('teacher.password.change')}}">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                            </ul>
                        @endauth
                        {{-- @auth('student')
                            <ul class="dropdown-menu">
                                <li><a href="{{route('profile.show')}}">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="{{route('password.change')}}">Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                            </ul>
                        @endauth --}}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>