@extends('layouts.app') <!-- se usi un layout base -->

@section('content')
    <h2>Elenco Voli</h2>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('flights.create') }}">➕ Aggiungi nuovo volo</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Compagnia</th>
                <th>Partenza</th>
                <th>Arrivo</th>
                <th>Data</th>
                <th>Ora Partenza</th>
                <th>Ora Arrivo</th>
                <th>Prezzo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($flights as $flight)
                <tr>
                    <td>{{ $flight->airline->nome_compagnia }}</td>
                    <td>{{ $flight->aeroporto_partenza }}</td>
                    <td>{{ $flight->aeroporto_arrivo }}</td>
                    <td>{{ $flight->data_partenza }}</td>
                    <td>{{ $flight->ora_partenza }}</td>
                    <td>{{ $flight->ora_arrivo }}</td>
                    <td>€ {{ $flight->prezzo_base }}</td>
                    <td>
                        <a href="{{ route('flights.edit', $flight) }}">✏️ Modifica</a>

                        <form action="{{ route('flights.destroy', $flight) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sei sicuro di voler eliminare questo volo?')">🗑️ Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
