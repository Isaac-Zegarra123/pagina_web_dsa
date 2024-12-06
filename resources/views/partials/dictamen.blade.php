<div class="row">
    @foreach($dictamenes as $dictamen)
        <div class="col-lg-3 col-md-6 mb-4 wow fadeInUp" data-wow-delay="0.3s">
            <div class="convocatoria-item shadow-lg rounded">
                <div class="convocatoria-inner">
                    <!-- Mostrar la imagen generada desde el PDF -->
                    @if(!empty($dictamen->image))
                        <img src="{{ asset($dictamen->image) }}" class="w-100 rounded-top" alt="Image">
                    @else
                        <img src="{{ asset('images/dictamen12.png') }}" class="w-100 rounded-top" alt="Image">
                    @endif

                    <div class="convocatoria-title text-center" style="10px 30px 20px">
                        <!-- Título del dictamen -->
                        <a class="h4 d-inline-block text-white">{{ $dictamen->titulo }}</a>
                    </div>
                </div>
                <div class="convocatoria-content p-3 text-center">
                    @php
                        $archivo = json_decode($dictamen->archivo, true);
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
</div>
