<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Curricular</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  @vite(['resources/routes/route.js', 'resources/css/routes/routes.css'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
</head>
<body>
  @include('layouts.nav')
  <div class=" service pb-5">
    <div class="col-lg-12">
        <div class="resolutions-section-title d-flex align-items-center justify-content-center">
            <!-- Imagen alineada a la izquierda con enlace -->
            <a href="https://www.uatf.edu.bo/" class="logo_img me-3"> <!-- Reemplaza URL_DE_DESTINO con la URL real -->
                <img src="{{ asset('images/logo_uatf.png') }}" alt="Logo" class="logo-img">
            </a>
            <!-- Título centrado -->
            <h2 class="sub-t mb-0 flex-grow-1 text-center">Diseño Curricular</h2>
        </div>
    </div>
      <div class="curricular-container" >
        <div class="year-selection-container">
            <!-- Dropdown para seleccionar el año -->
            <div class="year-selector">
                <label for="yearDropdown">Seleccionar Año:</label>
                <select id="yearDropdown"  onchange="location = this.value;">
                    @foreach($years as $year)
                        <option value="{{ route('pages.curricular', $year) }}" {{ $currentYear == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>

            </div>    
                <!-- Indicador del año actual -->
                <div class="current-year">
                    <h2>GESTIÓN</h2>
                    <div class="year-indicator">{{ $currentYear }}</div>
                </div>
            
        </div>
    
            <div class="row curricular-menu-curricular-container" id="circulares-container">
                @include('partials.curricular', ['curricular' => $curriculares])
            </div>
        </div>
    </div>
    
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
      // Manejar clic en los años
      $('.filter-year').on('click', function() {
          var year = $(this).data('filter');

          // Realizar la solicitud AJAX
          $.ajax({
              url: '{{ route("curricular") }}',
              type: 'GET',
              data: { year: year },
              success: function(response) {
                  // Actualizar solo el contenedor de circulares, no el nav u otros elementos
                  $('#curricular-container').html(response);
              },
              error: function() {
                  console.error('Error al filtrar los circulares.');
              }
          });
      });
  });
</script>


</body>

</html>