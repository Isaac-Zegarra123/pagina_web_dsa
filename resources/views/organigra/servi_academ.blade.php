<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D.S.A</title>
    @vite(['resources/routes/route.js', 'resources/css/routes/routes.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
    @include('layouts.nav')
    <div class="service">
        <div class="col-lg-12">
            <div class="resolutions-section-title d-flex align-items-center justify-content-center">
                <!-- Imagen alineada a la izquierda con enlace -->
                <a href="https://www.uatf.edu.bo/" class="logo_img me-3"> <!-- Reemplaza URL_DE_DESTINO con la URL real -->
                    <img src="{{ asset('images/logo_uatf.png') }}" alt="Logo" class="logo-img">
                </a>
                <!-- Título centrado -->
                <h2 class="sub-t mb-0 flex-grow-1 text-center">Direccion de Servicios Academicos</h2>
            </div>
        </div>
        <div class="container">
                    <div class="row" style="padding: 50px">
                        <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="{{ Storage::url($dsa->imagen_1) }}" alt="imagen_1">
                        </div>
                        <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="h-100">
                                <h4 class="sentral-title text-start text-primary pe-3"><i class="fas fa-info-circle"></i> {{ $dsa->subtitulo_1 }}</h4>
                                <p>{{ $dsa->texto_1 }}</p>
                                <ul class="about-info mt-4 px-md-0 px-2">
                                    <li class="d-flex"><i class="fas fa-map-marker-alt me-2"></i> <span>Direccion:</span> <span>{{ $dsa->direccion }}</span></li>
                                    <li class="d-flex"><i class="fas fa-building me-2"></i> <span>Edificio:</span> <span>{{ $dsa->edificio }}</span></li>
                                    <li class="d-flex"><i class="fas fa-phone me-2"></i> <span>Teléfono:</span> <span>{{ $dsa->telefono_1 }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
            <div>
                <div class="container-xxl cuerpo"></div>
                <div class="sub-container">
                    <div class="sub">
                        <h1 class="title-cont"><i class="fas fa-tasks"></i> Funciones de la unidad</h1>
                    </div>
                </div>
                <div class="">
                    <div class="row g-5" style="padding: 50px">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="h-100">
                                <h6 class="sentral-title text-start text-primary pe-3"><i class="fas fa-briefcase"></i> {{ $dsa->subtitulo_2 }}</h6>
                                <p>{!! nl2br(e($dsa->texto_2)) !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="">
                                <img class="img-fluid" src="{{ Storage::url($dsa->imagen_2) }}" alt="imagen_2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Directora -->
            <div class="container-xxl cuerpo"></div>
            <section>
                <div class="personaje-container" style="padding: 50px">
                    <div class="row d-flex align-items-center no-gutters">
                        <div class="col-md-6 col-lg-5 d-flex justify-content-center">
                            <img class="img-fluide rounded-circle custom-img" style="width: 1200PX" src="{{ Storage::url($dsa->imagen_3) }}" alt="imagen_3">
                        </div>
                        <div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5">
                            <div>
                                <div class="row justify-content-start pb-3">
                                    <div class="col-md-12 heading-section ftco-animate">
                                        <h2 class="sentral-title title-custom"><i class="fas fa-user-circle"></i> {{ $dsa->subtitulo_3 }}</h2>
                                        <p>{{ $dsa->texto_3 }}</p>
                                        <ul class="about-info mt-4 px-md-0 px-2">
                                            <li class="d-flex"><i class="fas fa-user me-2"></i> <span>Nombre:</span> <span>{{ $dsa->nombre }}</span></li>
                                            <li class="d-flex"><i class="fas fa-envelope me-2"></i> <span>Correo:</span> <span>{{ $dsa->correo }}</span></li>
                                            <li class="d-flex"><i class="fas fa-phone me-2"></i> <span>Teléfono:</span> <span>{{ $dsa->telefono }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
