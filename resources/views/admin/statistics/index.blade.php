<x-layout>
    <div class="container">
        <h1 class="mb-4">📊 Dashboard Statistiche</h1>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-warning mb-3">Torna indietro</a>

        <div class="row">
            <!-- Prenotazioni per Mese -->
            <div class="col-md-6">
                <h4>Prenotazioni per Mese</h4>
                <div class="chart-container">
                    <canvas id="bookingChart"></canvas>
                </div>
            </div>
            <!-- Extra Prenotati -->
            <div class="col-md-6">
                <h4>Extra Prenotati</h4>
                <div class="chart-container">
                    <canvas id="extrasChart"></canvas>
                </div>
            </div>

            <!--Airlines  piu prenotate-->
            <div class="col-md-6">
                <h4>Compagnie aeree piu prenotate</h4>
                <div class="chart-container">
                
                      <canvas id="mostBookedChart"></canvas>
               
                </div>
            </div>

            <!--voli piu prenotati-->
            <div class="col-md-6">
            <h2 class="mt-5">Voli Più Prenotati</h2>
            <ul>
            @foreach($mostBookedFlights as $flight)
            <li>
                Da: {{ $flight->aeroporto_partenza }} - A: {{ $flight->aeroporto_arrivo }} - Prenotazioni: {{ $flight->total }}
            </li>
            @endforeach
            </ul>
            </div>


        </div>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
       
        const ctx1 = document.getElementById('bookingChart');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Prenotazioni',
                    data: {!! json_encode($bookingCounts) !!},
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: '#007bff',
                    borderWidth: 1
                }]
            }
        });

        
        const ctx2 = document.getElementById('extrasChart');
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($extraLabels) !!},
                datasets: [{
                    label: 'Extra',
                    data: {!! json_encode($extraCounts) !!},
                    backgroundColor: ['#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1']
                }]
            }
        });


        const ctx3 = document.getElementById('mostBookedChart');
        new Chart(ctx3, {
            type:'bar',
            data: {
                labels: {!! json_encode($mostBookedAirlineLabels) !!},
                datasets: [{
                    label: 'Voli piu prenotati',
                    data: {!! json_encode($mostBookedAirlineCounts) !!},
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: '#007bff',
                    borderWidth: 1
                }]
            }
        });


            




    </script>
    <style>
        .chart-container {
            position: relative;
            height: 300px;
            margin-bottom: 30px;
        }
       
    
    </style>    


</x-layout>



