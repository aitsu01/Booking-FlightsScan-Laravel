<x-layout>
<header class="container-fluid vh-100 d-flex align-items-center justify-content-center text-light">
        <div class="text-center">
            <h1>Benvenuto su Skyscan</h1>
            <p class="lead">Cerca il tuo volo ideale tra centinaia di destinazioni</p>

            <!-- Form di ricerca -->
            <form action="{{ route('flights.search') }}" method="GET" class="mt-4">
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" name="aeroporto_partenza" class="form-control" placeholder="Aeroporto di Partenza" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="aeroporto_arrivo" class="form-control" placeholder="Aeroporto di Arrivo" required>
                    </div>
                    <div class="form-group">
                        <input type="date" name="data_partenza" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Cerca</button>
                    </div>
                </div>
            </form>
        </div>
    </header>

    <!-- LAST MINUTE VOLI -->
    <div class="container my-5">
        <h2 class="mb-4 text-center">✈️ Offerte Last Minute</h2>
        @if($latestFlights->isNotEmpty())
            <div class="row">
                @foreach($latestFlights as $flight)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $flight->nome ?? 'Volo #' . $flight->id }}</h5>
                                <p class="card-text">
                                    <strong>Partenza:</strong> {{ $flight->aeroporto_partenza }}<br>
                                    <strong>Arrivo:</strong> {{ $flight->aeroporto_arrivo }}<br>
                                    <strong>Data:</strong> {{ $flight->data_partenza }}
                                </p>
                                <a href="{{ route('flights.show', $flight) }}" class="btn btn-outline-primary btn-sm">Dettagli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">🚫 Nessun volo disponibile al momento.</p>
        @endif
    </div>
</x-layout>
