<x-layout>
<div class="container">
    <h1>Dettagli Volo</h1>
    
    <p><strong>Compagnia Aerea:</strong> {{ $flight->airline->nome_compagnia }}</p>
    <p><strong>Aeroporto di Partenza:</strong> {{ $flight->aeroporto_partenza }}</p>
    <p><strong>Aeroporto di Arrivo:</strong> {{ $flight->aeroporto_arrivo }}</p>
    <p><strong>Data di Partenza:</strong> {{ $flight->data_partenza }}</p>
    <p><strong>Ora di Partenza:</strong> {{ $flight->ora_partenza }}</p>
    <p><strong>Ora di Arrivo:</strong> {{ $flight->ora_arrivo }}</p>
    <p><strong>Prezzo Base:</strong> €{{ $flight->prezzo_base }}</p>
    @guest
        <a href="{{ route('homepage') }}" class="btn btn-primary mt-3">Torna alla home</a>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary mt-3">Prenota subito</a>
    @endguest



    @auth
    @if(auth()->user()->is_admin)
        
        <a href="{{ route('admin.flights.index') }}" class="btn btn-secondary mt-3">Torna all'elenco</a>
    @else
        
        <a href="{{ route('flights.search') }}" class="btn btn-primary mt-3">Torna ai risultati</a>
    @endif
@endauth
</div>
</x-layout>

