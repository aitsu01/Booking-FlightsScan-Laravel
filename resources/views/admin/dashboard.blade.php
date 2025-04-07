<x-layout>
<div class="container">
    <h1>Dashboard Admin</h1>
    <p>Benvenuto, {{ auth()->user()->name }}!</p>
    <ul>
        <li><a href="{{ route('admin.airlines.index') }}">Gestisci Compagnie Aeree</a></li>
        <li><a href="{{ route('admin.flights.index') }}">Gestisci Voli</a></li>
        <li><a href="{{ route('admin.extras.index') }}">Gestisci Extra</a></li>
        <li><a href="{{ route('admin.statistics.index') }}">Vai alle Statistiche</a></li>
    </ul> 
    
</div>    
        




</x-layout>

