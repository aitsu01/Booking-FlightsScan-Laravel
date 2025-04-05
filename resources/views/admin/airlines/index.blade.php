<x-layout>
<div class="container">
    <h1>Elenco Compagnie Aeree</h1>
    <a href="{{ route('admin.airlines.create') }}" class="btn btn-primary mb-3">Aggiungi Nuova Compagnia</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Compagnia</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($airlines as $airline)
            <tr>
                <td>{{ $airline->id }}</td>
                <td>{{ $airline->nome_compagnia }}</td>
                <td>
                    <a href="{{ route('admin.airlines.edit', $airline) }}" class="btn btn-sm btn-warning">Modifica</a>
                    <form action="{{ route('admin.airlines.destroy', $airline) }}" method="POST" style="display:inline-block;">
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