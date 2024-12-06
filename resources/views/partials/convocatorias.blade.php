<div class="row">
    @if($convocatorias->count() > 0)
        @foreach ($convocatorias as $convocatoria)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="convocatoria-item shadow-lg rounded">
                    <div class="lorg">
                        <div class="convocatoria-inner">
                            @if($convocatoria->image)
                                <img src="{{ $convocatoria->image }}" class="w-100 rounded-top" alt="{{ $convocatoria->titulo }}">
                            @else
                                <img src="{{ asset('images/convocatorias_dsa.png') }}" class="w-100 rounded-top" alt="Convocatoria">
                            @endif
                            <div class="convocatoria-title text-center" style="10px 30px 20px">
                                <a href="#" class="text-white">{{ $convocatoria->titulo }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="convocatoria-content p-3 text-center">
                        @php
                            $archivo = json_decode($convocatoria->archivo, true);
                        @endphp
                        @if(isset($archivo[0]['download_link']))
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
        @endforeach
    @else
        <p class="text-center">No hay convocatorias disponibles.</p>
    @endif
</div>

<!-- Paginación -->
<div class="col-12 text-center mt-4">
    {{ $convocatorias->links('pagination::bootstrap-5') }}
</div>
