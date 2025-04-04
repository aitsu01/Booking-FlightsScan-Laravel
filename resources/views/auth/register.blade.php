<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
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
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Conferma Password</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <button type="submit">Registrati</button>
        <a href="{{ route('login') }}">Già iscritto?</a>
    </form>
</body>
</html>
