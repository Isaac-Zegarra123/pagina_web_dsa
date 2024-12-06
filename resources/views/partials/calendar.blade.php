<div class="row">
    @foreach($calendars as $Calendar)
        <div class=>
            <div class="">
                <div class="modern-header d-flex align-items-center">
                    <div class="approval-section d-flex align-items-center">
                        <h3>Dictamen:</h3>
                        <p>{{ $Calendar->dictamen }}</p>
                    </div>
                    <div class="resolution-section d-flex align-items-center">
                        <h3>Resolución:</h3>
                        <p>{{ $Calendar->resolucion }}</p>
                    </div>
                </div>
                    @php
                        // Accede a la propiedad 'archivo' del objeto $Calendar
                        $archivo = json_decode($Calendar->archivo, true);
                    @endphp
                    @if(isset($archivo[0]['download_link']))
                        <div class="embed-container">
                            <!-- Para mostrar archivos PDF directamente en la página -->
                            <iframe 
                                src="{{ asset('storage/' . $archivo[0]['download_link']) }}" 
                                style="width: 100%; height: 950px; border: none;">
                            </iframe>
                        </div>
                    @else
                        <p>No se pudo encontrar el archivo.</p>
                    @endif
                </div>    
        </div>
    @endforeach
</div>
