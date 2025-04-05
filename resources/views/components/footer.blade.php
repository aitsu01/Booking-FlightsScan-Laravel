
<footer class="footer text-white pt-5" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364);">
    <div class="container">
        <div class="row text-center text-md-start align-items-start">
            
            <!-- CTA -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3">🌍 Pronto a partire?</h5>
                <p>Scopri offerte last minute e vivi la tua prossima avventura con Skyscan.</p>
                <a href="{{ route('flights.search') }}" class="btn btn-outline-light btn-sm mt-2">Cerca un volo</a>
            </div>

            <!-- Destinazioni animate -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3"> Destinazioni popolari</h5>
                <div class="d-flex justify-content-between gap-2 flex-wrap">
                    @php
                        $cities = [
                                      'https://mdbootstrap.com/img/new/fluid/city/111.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/112.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/113.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/114.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/115.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/116.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/117.jpg',
                                      'https://mdbootstrap.com/img/new/fluid/city/118.jpg',
                        ];
                    @endphp
                    @foreach ($cities as $city)
                        <div class="footer-img-wrap">
                            <img src="{{ $city }}" class="footer-img rounded shadow" alt="city">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Info -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3">📍 Contatti</h5>
                <ul class="list-unstyled small">
                    <li>Milano, Italia</li>
                    <li><a href="mailto:info@skyscan.com" class="text-white text-decoration-none">info@skyscan.com</a></li>
                    <li>+39 0123 456789</li>
                </ul>
                <div class="mt-3">
                    <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="text-center p-3 mt-4 border-top border-light" style="background-color: rgba(255, 255, 255, 0.05);">
        © {{ date('Y') }} <strong>Skyscan</strong> • Voli per ogni destinazione ✈️
    </div>
</footer>


