<nav class="navbar navbar-expand-md navbar text-white shadow-sm servis-navbar">
    <i class="fas fa-bars sideBarIcon" id="sideNavToggle"></i>
    <a class="navbar-brand text-white" href="{{ url('/') }}">
        {{ config('app.name') }}
    </a>

    <ul class="navbar-nav ml-auto text-white">
        @guest
            <li><a href="{{route('login')}}" class="nav-link">Log in</a></li>
            <li><a href="{{route('register')}}" class="nav-link">Register</a></li>

        @else
            <li class="nav-item dropdown">
                <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{route('logout')}}" class="dropdown-item"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form action="{{route('logout')}}" method="POST" style="display: none;" id="logout-form">
                        @csrf
                    </form>
                </div>

            </li>
        @endguest
    </ul>

</nav>
