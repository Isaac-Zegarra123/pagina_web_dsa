<div class="custom-container">
    <div id="carousel-section">
        @foreach ($carousels as $carousel)
            <div class="carousel-item">
                <img src="{{ asset('storage/' . $carousel->image) }}" alt="{{ $carousel->title }}">
            </div>
        @endforeach
    </div>

    <!-- Convocatorias -->
    <div id="convocatorias-container">
        @include('partials.convocatorias', ['convocatorias' => $convocatorias])
    </div>
</div>
