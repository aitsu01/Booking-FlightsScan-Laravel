<x-layout>

<div class="card mb-3">
    
        <div class="card-body">
            <h5 class="card-title">Dettagli Volo</h5>
            
            <p><strong>Aeroporto Partenza:</strong> {{ $flight->aeroporto_partenza }}</p>
            <p><strong>Aeroporto Arrivo:</strong> {{ $flight->aeroporto_arrivo }}</p>
            <p><strong>Data Partenza:</strong> {{ $flight->data_partenza }}</p>
        </div>
</div>

  
</x-layout>