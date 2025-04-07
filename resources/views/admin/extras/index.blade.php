<x-layout>
    <div class="container">
        <h1>Elenco Extra</h1>
        <a href="{{ route('admin.extras.create') }}" class="btn btn-primary mb-3">Aggiungi un nuovo extra</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3">Torna indietro</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome Extra</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($extras as $extra)
                    <tr>
                        <td>{{ $extra->id }}</td>
                        <td>{{ $extra->nome_extra }}</td>
                        <td>
                             <a href="{{ route('admin.extras.show', $extra) }}" class="btn btn-sm btn-info">Show</a>
                            <a href="{{ route('admin.extras.edit', $extra) }}" class="btn btn-sm btn-warning">Modifica</a>
                            <form action="{{ route('admin.extras.destroy', $extra) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Confermi l\'eliminazione?')">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
