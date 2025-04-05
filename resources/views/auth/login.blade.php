<x-layout>
<div class="auth-wrapper">
    <div class="login-container">
      <h2>Accedi al tuo account</h2>

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Entra</button>

        <div class="extra-links">
          <a href="{{ route('register') }}">Non hai un account? Registrati</a>
        </div>
      </form>
    </div>
  </div>
</x-layout>

