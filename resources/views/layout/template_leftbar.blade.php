<div class="span3" >
    <style>
        /* General styles for the sidebar */
.span3 {
    margin-left: -176px;
    margin-top: -40px;
}

    </style>
    <div class="sidebar" >
        @auth('admin')
            <ul class="widget widget-menu unstyled">
                <li>
                    <a href="{{route('admin.home')}}">
                        <i class="menu-icon icon-home" style="color: white;"></i>Home
                    </a>
                </li>

                <li>
                    <a href="{{ URL::route('teachers.info') }}">
                        <i class="menu-icon icon-group" style="color: white;"></i>All Teachers Information
                    </a>
                </li> 

                <li>
                    <a href="{{ URL::route('students.info') }}">
                        <i class="menu-icon icon-group" style="color: white;"></i>All Students Information
                    </a>
                </li> 

                <li>
                    <a href="{{ URL::route('all-books') }}">
                        <i class="menu-icon icon-th-list" style="color: white;"></i>All Books in Library
                    </a>
                </li>
                <li>
                    <a href="{{ URL::route('add-book-category') }}">
                        <i class="menu-icon icon-folder-open-alt" style="color: white;"></i>Add Book Category
                    </a>
                </li>
                <li>
                    <a href="{{ URL::route('add-books') }}">
                        <i class="menu-icon icon-folder-open-alt" style="color: white;"></i>Add Books
                    </a>
                </li>
    
                {{-- <li>
                    <a href="{{ URL::route('books.book-requests') }}">
                        <i class="menu-icon icon-list-ul" style="color: white;"></i>View all requested books  
                    </a>
                </li> --}}

                <li>
                    <a href="{{ URL::route('students-for-approval') }}">
                        <i class="menu-icon icon-filter" style="color: white;"></i> All Waiting Requested Books
                    </a>
                </li>
                <li>
                    <a href="{{ URL::route('registered-students') }}">
                        <i class="menu-icon icon-group" style="color: white;"></i>All approved Requests
                    </a>
                </li>

                <li>
                    <a href="{{ URL::route('issue-return') }}">
                        <i class="menu-icon icon-signout" style="color: white;"></i>Issue / Return Books
                    </a>
                </li>

                <li>
                    <a href="{{ URL::route('currently-issued') }}">
                        <i class="menu-icon icon-list-ul" style="color: white;"></i>View all currently issued books  
                    </a>
                </li>

                <li>
                    <a href="{{ URL::route('settings') }}">
                        <i class="menu-icon icon-cog" style="color: white;"></i>Manage Settings
                    </a>
                </li>
            </ul>
        @endauth

        @auth('teacher')
            <ul class="widget widget-menu unstyled">
                <li>
                    <a href="{{route('teacher.home')}}">
                        <i class="menu-icon icon-home" style="color: white;"></i>Home
                    </a>
                </li>
                <li>
                    <a href="{{ URL::route('teacher-all-books') }}">
                        <i class="menu-icon icon-th-list" style="color: white;"></i>All Books in Library
                    </a>
                </li>

                <li>
                    <a href="{{ URL::route('student-registration') }}">
                        <i class="menu-icon icon-user" style="color: white;"></i> Request Book
                    </a>
                </li>
                
                <li>
                    <a href="{{ URL::route('teacher.my-currently-issued-books') }}">
                        <i class="menu-icon icon-filter" style="color: white;"></i>My issued books
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ URL::route('teacher.currently-issued') }}">
                        <i class="menu-icon icon-filter" style="color: white;"></i>My issued books
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="{{ URL::route('teacher.request-book') }}">
                        <i class="menu-icon icon-folder-open-alt" style="color: white;"></i>Request book
                    </a>
                </li> --}}
            </ul>
        @endauth

        {{-- @auth('student')
            <ul class="widget widget-menu unstyled">
                <li>
                    <a href="">
                        <i class="menu-icon icon-home" style="color: white;"></i>Home
                    </a>
                </li>
            </ul>
        @endauth --}}
        <ul class="widget widget-menu unstyled">
            <li><a href="{{ URL::route('logout') }}"><i class="menu-icon icon-wrench" style="color: white;"></i>Logout </a></li>
        </ul>
    </div>
</div>