<nav class="navbar navbar-expand-lg navbar-light bg-light py-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ route('homepage') }}">Skyscan</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
      aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('homepage') }}">Home</a>
        </li>

        @auth
          @if(auth()->user()->is_admin)
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
            </li>
          @endif
        @endauth
      </ul>

      <ul class="navbar-nav ms-auto">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
          </li>
        @else
          <li class="nav-item">
            <span class="nav-link">Ciao, {{ auth()->user()->name }}</span>
          </li>
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn btn-link nav-link" style="display: inline; padding: 0; border: none; background: none;">
                Logout
              </button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
