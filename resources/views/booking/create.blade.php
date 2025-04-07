<x-layout>
    <div class="container">
        <h1 class="mb-4">Prenota il Volo</h1>

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

            

                    <!-- Container per i passeggeri -->
            <div id="passeggeri-container">
                <div class="passeggero border rounded p-3 mb-3">
                    <div class="mb-3">
                        <label for="passenger0_nome" class="form-label">Nome Passeggero</label>
                        <input type="text" id="passenger0_nome" name="passengers[0][nome]" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="passenger0_cognome" class="form-label">Cognome</label>
                        <input type="text" id="passenger0_cognome" name="passengers[0][cognome]" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="passenger0_data_nascita" class="form-label">Data di Nascita</label>
                        <input type="date" id="passenger0_data_nascita" name="passengers[0][data_nascita]" required class="form-control">
                    </div>
                    <div class="mb-3">
                         <label for="passenger0_sesso" class="form-label">Sesso</label>
                        <select id="passenger0_sesso" name="passengers[0][sesso]" required class="form-control">
                        <option value="">Seleziona sesso</option>
                        <option value="Uomo">Uomo</option>
                        <option value="Donna">Donna</option>
                        </select>
                    </div>


                    <div class="mb-3">
                         <label for="passenger0_nazionalita" class="form-label">Nazionalità</label>
                         <select id="passenger0_nazionalita" name="passengers[0][nazionalita]" required class="form-control">
                         <option value="">Seleziona nazionalità</option>
                         <option value="IT">Italia</option>
                         <option value="US">Stati Uniti</option>
                         <option value="FR">Francia</option>
                         <option value="DE">Germania</option>
                         <option value="GB">Regno Unito</option>
               
                        </select>
                    </div>

                    <div>
                    <p>
                    Inserisci il nome esattamente come appare sui documenti di viaggio per il check-in. Se il nome non è corretto, potresti non essere in grado di imbarcarti sul volo e ti verrà addebitato un costo di cancellazione.
                    </p>
                    </div>

                    
                    <div>
                    Al fine di evitare qualsiasi inconveniente durante il viaggio, assicurati che il documento di viaggio del passeggero sia valido per almeno 6 mesi dalla data di fine del viaggio.
                    </div>

                    

                </div>
            </div>
                    




            <button type="button" class="btn btn-secondary my-2" id="addPasseggero">+ Aggiungi passeggero</button>

            <!-- Sezione per gli extra -->
            <h3 class="mt-4">Seleziona Extra</h3>
            @foreach($extras as $extra)
                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="extras[{{ $extra->id }}][checked]" value="1" class="form-check-input" id="extra{{ $extra->id }}">
                        <label for="extra{{ $extra->id }}" class="form-check-label">{{ $extra->nome_extra }} ({{ $extra->prezzo_extra }} €)</label>
                    </div>
                    <div class="mt-2">
                        <input type="number" name="extras[{{ $extra->id }}][quantità]" value="1" min="1" class="form-control" style="width: 100px;">
                    </div>
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
        <div class="passeggero border rounded p-3 mb-3">
            <div class="mb-3">
                <label for="passenger${index}_nome" class="form-label">Nome Passeggero</label>
                <input type="text" id="passenger${index}_nome" name="passengers[${index}][nome]" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="passenger${index}_cognome" class="form-label">Cognome</label>
                <input type="text" id="passenger${index}_cognome" name="passengers[${index}][cognome]" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="passenger${index}_data_nascita" class="form-label">Data di Nascita</label>
                <input type="date" id="passenger${index}_data_nascita" name="passengers[${index}][data_nascita]" required class="form-control">
            </div>
            <div class="mb-3">
                <label for="passenger${index}_sesso" class="form-label">Sesso</label>
                <select id="passenger${index}_sesso" name="passengers[${index}][sesso]" required class="form-control">
                    <option value="">Seleziona sesso</option>
                    <option value="Uomo">Uomo</option>
                    <option value="Donna">Donna</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="passenger${index}_nazionalita" class="form-label">Nazionalità</label>
                <select id="passenger${index}_nazionalita" name="passengers[${index}][nazionalita]" required class="form-control">
                    <option value="">Seleziona nazionalità</option>
                    <option value="IT">Italia</option>
                    <option value="US">Stati Uniti</option>
                    <option value="FR">Francia</option>
                    <option value="DE">Germania</option>
                    <option value="GB">Regno Unito</option>
                </select>
            </div>
            <button type="button" class="btn btn-danger btn-sm removePasseggero">➖ Rimuovi</button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    index++;
});

document.getElementById('passeggeri-container').addEventListener('click', function (e) {
    if (e.target.classList.contains('removePasseggero')) {
        e.target.closest('.passeggero').remove();
    }
});




        
        
        
    </script>


</x-layout>

