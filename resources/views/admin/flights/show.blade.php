<x-layout>
<div class="container">
    <h1>Dettagli Volo</h1>
    <p><strong>ID:</strong> {{ $flight->id }}</p>
    <p><strong>Compagnia Aerea:</strong> {{ $flight->airline->nome_compagnia }}</p>
    <p><strong>Aeroporto di Partenza:</strong> {{ $flight->aeroporto_partenza }}</p>
    <p><strong>Aeroporto di Arrivo:</strong> {{ $flight->aeroporto_arrivo }}</p>
    <p><strong>Data di Partenza:</strong> {{ $flight->data_partenza }}</p>
    <p><strong>Ora di Partenza:</strong> {{ $flight->ora_partenza }}</p>
    <p><strong>Ora di Arrivo:</strong> {{ $flight->ora_arrivo }}</p>
    <p><strong>Prezzo Base:</strong> €{{ $flight->prezzo_base }}</p>
    <a href="{{ route('admin.flights.index') }}" class="btn btn-secondary mt-3">Torna all'elenco</a>
</div>
</x-layout>

