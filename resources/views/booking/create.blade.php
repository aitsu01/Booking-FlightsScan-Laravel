<x-layout>
<div class="container">
    <h1>Prenota il Volo</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Dettagli Volo</h5>
            
            <p><strong>Aeroporto Partenza:</strong> {{ $flight->aeroporto_partenza }}</p>
            <p><strong>Aeroporto Arrivo:</strong> {{ $flight->aeroporto_arrivo }}</p>
            <p><strong>Data Partenza:</strong> {{ $flight->data_partenza }}</p>
        </div>
    </div>

    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

        <div id="passeggeri-container">
        <div class="form-group">
        <label>Nome Passeggero</label>
        <input type="text" name="passengers[0][nome]" required>
        <label>Cognome</label>
        <input type="text" name="passengers[0][cognome]" required>
        <label>Data di Nascita</label>
        <input type="date" name="passengers[0][data_nascita]" required>
        </div>
        </div>

        <button type="button" class="btn btn-secondary my-2" id="addPasseggero">+ Aggiungi passeggero</button>

       
       

    <!-- Sezione per gli extra -->
    <h3>Seleziona Extra</h3>
        @foreach($extras as $extra)
            <div class="form-group">
                <label>
                    <input type="checkbox" name="extras[{{ $extra->id }}][checked]" value="1">
                    {{ $extra->nome_extra }} ({{ $extra->prezzo_extra }} €)
                </label>
                <input type="number" name="extras[{{ $extra->id }}][quantità]" value="1" min="1" class="form-control" style="width:100px; display:inline-block;">
            </div>
        @endforeach

        


        <button type="submit" class="btn btn-primary mt-2">Conferma Prenotazione</button>
    </form>
</div>


<script>
    let index = 1;

document.getElementById('addPasseggero').addEventListener('click', function () {
    const container = document.getElementById('passeggeri-container');
    const html = `
        <div class="form-group mt-3 passeggero border rounded p-3 mb-2">
            <label>Nome Passeggero</label>
            <input type="text" name="passengers[${index}][nome]" required class="form-control mb-2">
            
            <label>Cognome</label>
            <input type="text" name="passengers[${index}][cognome]" required class="form-control mb-2">
            
            <label>Data di Nascita</label>
            <input type="date" name="passengers[${index}][data_nascita]" required class="form-control mb-2">

            <button type="button" class="btn btn-danger btn-sm removePasseggero">➖ Rimuovi</button>
        </div>`;
    container.insertAdjacentHTML('beforeend', html);
    index++;
});

// Rimuovi un passeggero
document.getElementById('passeggeri-container').addEventListener('click', function (e) {
    if (e.target.classList.contains('removePasseggero')) {
        e.target.closest('.passeggero').remove();
    }
});

</script>









</x-layout>

