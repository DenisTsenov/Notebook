
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--<a class="navbar-brand" href="#">Navbar</a>-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/about') }}">About</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/contact') }}">Contact </a>
            </li>
            @if(Auth::check())
            <li class="nav-item {{ Request::is('all-notes') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('note.all') }}">Quick View of all</a>
            </li>
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Notes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('note.index')}}">Notes List</a>
                    <a class="dropdown-item" href="{{ route('note.create')}}">Create New Note</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">{{ Auth::user()->name }} Profile</a>
                </div>
            </li>
            
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('category.index')}}">Categories List</a>
                    <a class="dropdown-item" href="{{ route('category.create')}}">Create New Category</a>
                </div>
            </li>
            
             @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mr-auto">
            
            @if(!Auth::check())
            <li class="nav-item {{ Request::is('auth/register') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('get.register') }}">Register <span class="sr-only">(current)</span></a>
            </li>
             <li class="nav-item {{ Request::is('auth/login') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('get.login') }}">Login <span class="sr-only">(current)</span></a>
            </li>
            @elseif(Auth::check())
                
             <li class="nav-item {{ Request::is('logout') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('logout') }}">Logout<span class="sr-only">(current)</span></a>
            </li>
            @endif
    </div>
</nav>