<x-layout>
    <header class="container-fluid vh-100 bg-dark text-light d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1>Benvenuto su Skyscan</h1>
            <p class="lead">Cerca il volo che fa per te</p>
            <!-- Form di ricerca -->
            <form action="{{ route('flights.search') }}" method="GET" class="mt-4">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="text" name="aeroporto_partenza" class="form-control" placeholder="Aeroporto di Partenza" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input type="text" name="aeroporto_arrivo" class="form-control" placeholder="Aeroporto di Arrivo" required>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="date" name="data_partenza" class="form-control" required>
                    </div>
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary">Cerca</button>
                    </div>
                </div>
            </form>
        </div>
    </header>

    
    <div class="container my-5">
        <h2 class="mb-4">Ultimi Voli Last minute</h2>
        @if($latestFlights->isNotEmpty())
            <div class="row">
                @foreach($latestFlights as $flight)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $flight->nome ?? 'Volo #' . $flight->id }}</h5>
                                <p class="card-text">
                                    <strong>Partenza:</strong> {{ $flight->aeroporto_partenza }}<br>
                                    <strong>Arrivo:</strong> {{ $flight->aeroporto_arrivo }}<br>
                                    <strong>Data:</strong> {{ $flight->data_partenza }}
                                </p>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Nessun volo disponibile al momento.</p>
        @endif
    </div>
</x-layout>
