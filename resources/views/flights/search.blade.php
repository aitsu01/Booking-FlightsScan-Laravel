<x-layout>
<div class="container">
    <h1>Cerca Voli</h1>
    <form action="{{ route('flights.search') }}" method="GET" class="mb-4">
        <div class="form-group">
            <label for="aeroporto_partenza">Aeroporto di Partenza</label>
            <input type="text" name="aeroporto_partenza" id="aeroporto_partenza" class="form-control" value="{{ request('aeroporto_partenza') }}">
        </div>
        <div class="form-group">
            <label for="aeroporto_arrivo">Aeroporto di Arrivo</label>
            <input type="text" name="aeroporto_arrivo" id="aeroporto_arrivo" class="form-control" value="{{ request('aeroporto_arrivo') }}">
        </div>
        <div class="form-group">
            <label for="data_partenza">Data di Partenza</label>
            <input type="date" name="data_partenza" id="data_partenza" class="form-control" value="{{ request('data_partenza') }}">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Cerca</button>
    </form>

    <h2>Risultati della ricerca</h2>
    @if($flights->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Aeroporto Partenza</th>
                    <th>Aeroporto Arrivo</th>
                    <th>Data Partenza</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->id }}</td>
                        <td>{{ $flight->aeroporto_partenza }}</td>
                        <td>{{ $flight->aeroporto_arrivo }}</td>
                        <td>{{ $flight->data_partenza }}</td>
                        <td>
                            <a href="{{ route('booking.create', $flight->id) }}" class="btn btn-sm btn-success">Prenota</a>
                            <a href="{{ route('flights.show', $flight->id) }}" class="btn btn-sm btn-info">Dettagli</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nessun volo trovato.</p>
    @endif
</div>
</x-layout>

