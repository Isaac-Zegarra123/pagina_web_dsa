<div class="row">
    @foreach($curriculares as $curricular)
        <div class="col-lg-3 curricular-menu-item filter-{{ $curricular->n_circulacion }}">
            <div class="resolutions-blog-item resolutions-latest-item">
                <h5>{{ $curricular->titulo }}</h5>
                <p>{{ $curricular->fecha_publicacion }}</p>
                <div style="padding: 15px; text-align: center">
                    <!-- Enlace para ver el PDF en una nueva pestaña -->
                    <div class="download-link">
                        @php
                            $archivo = json_decode($curricular->archivo, true);
                        @endphp
                        @if(!empty($archivo) && isset($archivo[0]['download_link']))
                            <a href="{{ asset('storage/' . $archivo[0]['download_link']) }}" 
                                target="_blank" class="btn btn-outline-light rounded-pill w-100">
                                Ver <i class="fa fa-eye"></i>
                            </a>
                        @else
                            <p>No se pudo encontrar el archivo.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
