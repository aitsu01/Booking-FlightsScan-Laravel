@extends('layouts.app')

@section('content')
    <h1>👨‍✈️ Admin Dashboard</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div style="border: 1px solid #ccc; padding: 20px;">
            <h3>✈️ Voli</h3>
            <a href="{{ route('flights.index') }}">📋 Gestisci Voli</a><br>
            <a href="{{ route('flights.create') }}">➕ Aggiungi Volo</a>
        </div>

        <div style="border: 1px solid #ccc; padding: 20px;">
            <h3>🏢 Compagnie Aeree</h3>
            <a href="{{ route('airlines.index') }}">📋 Gestisci Compagnie</a><br>
            <a href="{{ route('airlines.create') }}">➕ Aggiungi Compagnia</a>
        </div>

        <div style="border: 1px solid #ccc; padding: 20px;">
            <h3>🎁 Extra</h3>
            <a href="{{ route('extras.index') }}">📋 Gestisci Extra</a><br>
            <a href="{{ route('extras.create') }}">➕ Aggiungi Extra</a>
        </div>

        <div style="border: 1px solid #ccc; padding: 20px;">
            <h3>📦 Prenotazioni (solo lettura)</h3>
            <a href="{{ route('admin.bookings.index') }}">👀 Vedi tutte le prenotazioni</a>
        </div>
    </div>
@endsection
