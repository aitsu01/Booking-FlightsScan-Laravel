

<x-layout>
<div class="container">
    <h1>Aggiorna Extra per la Prenotazione #{{ $booking->id }}</h1>

    <form action="{{ route('booking.extras.update', $booking) }}" method="POST">
        @csrf

        <div class="form-group">
            @foreach($extras as $extra)
                <div class="form-check">
                    <input type="checkbox" 
                           class="form-check-input" 
                           id="extra_{{ $extra->id }}" 
                           name="extras[{{ $extra->id }}][checked]"
                           value="1"
                           @if($booking->extras->contains($extra->id)) checked @endif>
                    <label class="form-check-label" for="extra_{{ $extra->id }}">
                        {{ $extra->nome_extra }} ({{ $extra->prezzo_extra }} €)
                    </label>
                    <input type="number" 
                           name="extras[{{ $extra->id }}][quantità]" 
                           value="{{ optional($booking->extras->find($extra->id))->pivot->quantità ?? 1 }}" 
                           min="1" 
                           class="form-control" 
                           style="width: 100px; display:inline-block;">
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary mt-3">Aggiorna Extra</button>
    </form>
</div>
</x-layout>