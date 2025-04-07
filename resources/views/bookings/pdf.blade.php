<x-layout>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #2E86C1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
    </style>

    <h1>Dettagli Prenotazione</h1>
    <p><strong>PNR:</strong> {{ $booking->passengers->first()->pnr }}</p>
    <p><strong>Volo:</strong> {{ $booking->flight->aeroporto_partenza }} → {{ $booking->flight->aeroporto_arrivo }}</p>
    <p><strong>Data:</strong> {{ $booking->flight->data_partenza }}</p>

    <h3>Passeggeri:</h3>
    <ul>
        @foreach($booking->passengers as $p)
            <li>{{ $p->nome }} {{ $p->cognome }} - PNR: {{ $p->pnr }}</li>
        @endforeach
    </ul>

    <h3>Extra:</h3>
    <ul>
        @foreach($booking->extras as $e)
            <li>{{ $e->nome_extra }} (x{{ $e->pivot->quantita }})</li>
        @endforeach
    </ul>

    <h3>Prezzo Totale:</h3>
    <p>€{{ number_format($booking->flight->prezzo_base + $booking->extras->sum(function ($extra) {
        return $extra->prezzo_extra * $extra->pivot->quantita;
    }))}}

</x-layout>
