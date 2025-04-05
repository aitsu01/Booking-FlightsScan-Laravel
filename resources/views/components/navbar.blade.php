<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold text-primary" href="{{ route('homepage') }}">✈️ Skyscan</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active-link" href="{{ route('homepage') }}">Home</a>
        </li>

        @auth
          @if(auth()->user()->is_admin)
            <li class="nav-item">
              <a class="nav-link active-link text-danger" href="{{ route('admin.dashboard') }}">🔧 Admin</a>
            </li>
          @endif
        @endauth
      </ul>

      <ul class="navbar-nav ms-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link active-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active-link" href="{{ route('register') }}">Registrati</a>
          </li>
        @else



        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          👤 {{ auth()->user()->name }}
        </a>
       <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
       @if(!auth()->user()->is_admin)
       <li><a class="dropdown-item" href="{{ route('flights.search') }}">Trova il tuo volo</a></li>
       <li><a class="dropdown-item" href="{{ route('bookings.index') }}">Le tue prenotazioni</a></li>
       @endif
      <li><hr class="dropdown-divider"></li>
       <li>
       <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="dropdown-item text-danger">Logout</button>
      </form>
      </li>
     </ul>
     </li>


        @endguest
      </ul>
    </div>
  </div>
</nav>