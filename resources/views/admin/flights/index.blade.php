<x-layout>
    <div class="container">
        <h1>Elenco Voli</h1>
        <a href="{{ route('admin.flights.create') }}" class="btn btn-primary mb-3">Aggiungi un nuovo volo</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Compagnai Aerea</th>
                    <th>Aeroporto Partenza</th>
                    <th>Aeroporto Arrivo</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($flights as $flight)
                    <tr>
                        <td>{{ $flight->id }}</td>
                        <
                        <td>{{ $flight->airline->nome_compagnia }}</td>
                        <td>{{ $flight->aeroporto_partenza }}</td>
                        <td>{{ $flight->aeroporto_arrivo }}</td>
                        <td>
                            <a href="{{ route('admin.flights.show', $flight) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('admin.flights.edit', $flight) }}" class="btn btn-sm btn-warning">Modifica</a>
                            <form action="{{ route('admin.flights.destroy', $flight) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Confermi l\'eliminazione?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>


















