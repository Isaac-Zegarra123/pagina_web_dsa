<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro Curricular</title>
  @vite(['resources/routes/route.js', 'resources/css/routes/routes.css'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
    @include('layouts.nav')
    <div class="uatf-header-container">
        <a href="https://www.uatf.edu.bo/" class="logo_img me-3">
            <img src="{{ asset('images/logo_uatf.png') }}" alt="Logo" class="logo-img">
        </a>
        <div class="uatf-header-block">
            <h2 class="uatf-header-title">
                REGISTRO DE DISEÑOS CURRICULARES DE CARRERAS Y PROGRAMAS <br>
                SECRETARÍA NACIONAL ACADÉMICA - COMITÉ EJECUTIVO DE LA UNIVERSIDAD BOLIVIANA <br>
                UNIVERSIDAD AUTÓNOMA TOMÁS FRÍAS
            </h2>
        </div>
        
    </div>
    
    
    <div class="container uatf-main-container">

        <div class="uatf-scroll-wrapper mt-4">
            <div class="uatf-table-wrapper">
                <table class="uatf-data-table">
                    <thead class="uatf-table-head">
                        <tr>
                            <th class="uatf-table-header">No</th>
                            <th class="uatf-table-header">UNIV</th>
                            <th class="uatf-table-header">FAC.</th>
                            <th class="uatf-table-header">FACULTAD</th>
                            <th class="uatf-table-header">CARRERAS</th>
                            <th class="uatf-table-header">PROGRAMAS</th>
                            <th class="uatf-table-header">ÁREA</th>
                            <th class="uatf-table-header">GRD</th>
                            <th class="uatf-table-header">C/D</th>
                            <th class="uatf-table-header">SEDE</th>
                            <th class="uatf-table-header">DIPLOMA ACADÉMICO</th>
                            <th class="uatf-table-header">TÍTULO PROFESIONAL</th>
                            <th class="uatf-table-header">GESTIÓN</th>
                            <th class="uatf-table-header">EVNT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($registroCurricular as $registrocurricular)
                        <tr class="uatf-table-row">
                            <td class="uatf-table-cell">{{ $registrocurricular->no }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->uni }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->fac }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->facultad }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->carreras }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->programas }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->area }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->grd }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->central_distrito }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->sede }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->diploma_academico }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->titulo_profecional }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->gestion }}</td>
                            <td class="uatf-table-cell">{{ $registrocurricular->evnt }}</td>
                            
                        </tr>
                        @empty
                        <tr class="uatf-table-row">
                            <td class="uatf-table-cell" colspan="15">No hay datos disponibles</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
