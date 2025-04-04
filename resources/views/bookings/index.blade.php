@extends('layouts.app')

@section('content')
    <h2>Le tue Prenotazioni</h2>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('bookings.create') }}">✈️ Prenota un nuovo volo</a>

    @foreach($bookings as $booking)
        <div style="border:1px solid #ccc; padding:15px; margin-top:10px;">
            <p><strong>Volo:</strong> {{ $booking->flight->aeroporto_partenza }} → {{ $booking->flight->aeroporto_arrivo }}</p>
            <p><strong>Data:</strong> {{ $booking->flight->data_partenza }}</p>
            <p><strong>Ora:</strong> {{ $booking->flight->ora_partenza }} - {{ $booking->flight->ora_arrivo }}</p>
            <p><strong>Stato:</strong> {{ $booking->stato }}</p>
            <a href="{{ route('bookings.show', $booking) }}">📄 Dettagli</a>

            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Vuoi cancellare questa prenotazione?')">🗑️ Cancella</button>
            </form>
        </div>
    @endforeach
@endsection
