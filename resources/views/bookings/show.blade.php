<x-layout>
    <h2>Dettagli Prenotazione</h2>

    <p><strong>Volo:</strong> {{ $booking->flight->aeroporto_partenza }} → {{ $booking->flight->aeroporto_arrivo }}</p>
    <p><strong>Data:</strong> {{ $booking->flight->data_partenza }}</p>
    <p><strong>Orario:</strong> {{ $booking->flight->ora_partenza }} - {{ $booking->flight->ora_arrivo }}</p>
    <p><strong>Prezzo Base:</strong> €{{ $booking->flight->prezzo_base }}</p>

    <h4>Passeggeri:</h4>
    <ul>
        @foreach($booking->passengers as $passenger)
            <li>{{ $passenger->nome }} {{ $passenger->cognome }} ({{ $passenger->data_nascita }})</li>
        @endforeach
    </ul>
    <h4>Extra selezionati:</h4>

    @if($booking->extras->isEmpty())
    <p>Nessun extra selezionato.</p>
    @else
    <ul>
        @foreach($booking->extras as $extra)
            <li>
                {{ $extra->nome_extra }} ({{ $extra->pivot->quantita }}x) - Totale: €{{ $extra->prezzo * $extra->pivot->quantita }}
            </li>
        @endforeach
    </ul>
    @endif


    <a href="{{ route('bookings.index') }}">⬅️ Torna alle prenotazioni</a>
</x-layout>

