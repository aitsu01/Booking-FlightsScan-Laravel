<x-layout>
    <h2>Dettagli Prenotazione</h2>

    <p><strong>Volo:</strong> {{ $booking->flight->aeroporto_partenza }} → {{ $booking->flight->aeroporto_arrivo }}</p>
    <p><strong>Data:</strong> {{ $booking->flight->data_partenza }}</p>
    <p><strong>Orario:</strong> {{ $booking->flight->ora_partenza }} - {{ $booking->flight->ora_arrivo }}</p>
    <p><strong>Prezzo Base:</strong> €{{ $booking->flight->prezzo_base }}</p>

    

    <h4>Passeggeri</h4>
     <ul class="list-group">
    @foreach($booking->passengers as $passenger)
        <li class="list-group-item">
            {{ $passenger->nome }} {{ $passenger->cognome }} — <strong>PNR:</strong> {{ $passenger->pnr }}
        </li>
    @endforeach
    </ul>


    <h4>Extra inclusi nella prenotazione</h4>

@if($booking->extras->isNotEmpty())
    <ul class="list-group mb-4">
        @foreach($booking->extras as $extra)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $extra->nome_extra }} (x{{ $extra->pivot->quantita }})
                <span>
                    €{{ number_format($extra->prezzo_extra * $extra->pivot->quantita, 2, ',', '.') }}
                </span>
            </li>
        @endforeach
    </ul>
@else
    <p>Nessun extra selezionato.</p>
@endif





@php
    $prezzoBase = $booking->flight->prezzo_base;
    $totaleExtra = $booking->extras->sum(function ($extra) {
        return $extra->prezzo_extra * $extra->pivot->quantita;
    });
    $totale = $prezzoBase + $totaleExtra;
@endphp

<div class="alert alert-info">
    <strong>Prezzo volo:</strong> €{{ number_format($prezzoBase, 2, ',', '.') }}<br>
    <strong>Totale extra:</strong> €{{ number_format($totaleExtra, 2, ',', '.') }}<br>
    <hr>
    <strong>TOTALE:</strong> €{{ number_format($totale, 2, ',', '.') }}
</div>
<a href="{{ route('bookings.pdf', $booking) }}" class="btn btn-outline-primary">📄 Scarica PDF</a>




    <a href="{{ route('bookings.index') }}">⬅️ Torna alle prenotazioni</a>
</x-layout>

