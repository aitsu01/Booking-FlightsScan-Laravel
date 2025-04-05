<x-layout>

    <div class="register-container">
        <h2>Crea il tuo account</h2>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="password_confirmation">Conferma Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>
            <button type="submit">Registrati</button>
        </form>

        <div class="extra-links">
            <a href="{{ route('login') }}">Hai già un account? Accedi</a>
        </div>
    </div>

</x-layout>
