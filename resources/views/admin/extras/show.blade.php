<x-layout>
<div class="container">
    <h1>Dettagli Extra</h1>
    
    
    <p><strong>Prezzo:</strong> {{ $extra->prezzo_extra }}</p>
    <p><strong>Nome extra:</strong> {{ $extra->nome_extra }}</p>
    <p><strong> Data creazione extra:</strong> {{ $extra->created_at }}</p>
    <p><strong> Data modifica extra:</strong> {{ $extra->updated_at }}</p>



    
    
    <a href="{{ route('admin.extras.index') }}" class="btn btn-primary mt-3">Torna alla ista extras</a>
        
    
</div>
</x-layout>