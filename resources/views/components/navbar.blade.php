<nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
  <a class="navbar-brand" href="#">Skyscan</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('homepage') }}">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>


    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">Register</a>
      </li>
      
      <li class="nav-item">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
      <button type="submit">Logout</button>    
      </form>
      </li>

      @if(auth()->check() && auth()->user()->is_admin)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
        </li>
    @endif
      
    </ul>

  
    <form class="form-inline my-2 my-lg-0 ml-2">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>