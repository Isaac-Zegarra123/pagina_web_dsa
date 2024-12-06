<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensajeros</title>
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
                <!-- Logo a la izquierda -->
                <a href="https://www.uatf.edu.bo/" class="logo_img me-3">
                    <img src="{{ asset('images/logo_uatf.png') }}" alt="Logo" class="logo-img">
                </a>
                <!-- Título centrado -->
                <h2 class="sub-t mb-0 flex-grow-1 text-center">Mensajeros</h2>
            </div>
        </div>
        <div class="container">

            <!-- Sección de información -->
            <div class="sub-container">
                <div class="sub">
                    <h1 class="title-cont"><i class="fas fa-envelope"></i> Información de Mensajeros</h1>
                </div>
            </div>
            <div class="row g-5" style="padding: 50px">
                <!-- Columna de texto -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="h-100">
                        <h6 class="sentral-title text-start text-primary pe-3">
                            <i class="fas fa-info-circle"></i> {{ $Mensajeros->subtitulo_1 }}
                        </h6>
                        <p>{!! nl2br(e($Mensajeros->texto_1)) !!}</p>
                        <ul class="about-info mt-4 px-md-0 px-2">
                            <li class="d-flex">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                <span>Dirección:</span> <span>{{ $Mensajeros->direccion }}</span>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-building me-2"></i>
                                <span>Edificio:</span> <span>{{ $Mensajeros->edificio }}</span>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-phone me-2"></i>
                                <span>Teléfono:</span> <span>{{ $Mensajeros->telefono_1 }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Columna de imagen -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div>
                        <img class="img-fluid" src="{{ Storage::url($Mensajeros->imagen_1) }}" alt="imagen_1">
                    </div>
                </div>
            </div>

            <!-- Sección del encargado -->
            <div class="container-xxl cuerpo"></div>
            <section>
                <div class="personaje-container" style="padding: 50px">
                    <div class="row d-flex align-items-center no-gutters">
                        <!-- Imagen del encargado -->
                        <div class="col-md-6 col-lg-5 d-flex justify-content-center">
                            <img class="img-fluide rounded-circle custom-img" style="width: 1200px" src="{{ Storage::url($Mensajeros->imagen_2) }}" alt="imagen_2">
                        </div>
                        <!-- Información del encargado -->
                        <div class="col-md-6 col-lg-7 pl-md-4 pl-lg-5">
                            <div>
                                <div class="row justify-content-start pb-3">
                                    <div class="col-md-12 heading-section ftco-animate">
                                        <h2 class="sentral-title title-custom">
                                            <i class="fas fa-user-circle"></i> {{ $Mensajeros->subtitulo_2 }}
                                        </h2>
                                        <p>{{ $Mensajeros->texto_2 }}</p>
                                        <ul class="about-info mt-4 px-md-0 px-2">
                                            <li class="d-flex">
                                                <i class="fas fa-user me-2"></i>
                                                <span>Nombre:</span> <span>{{ $Mensajeros->nombre }}</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="fas fa-envelope me-2"></i>
                                                <span>Correo Electrónico:</span> <span>{{ $Mensajeros->correo }}</span>
                                            </li>
                                            <li class="d-flex">
                                                <i class="fas fa-phone me-2"></i>
                                                <span>Teléfono:</span> <span>{{ $Mensajeros->telefono }}</span>
                                            </li>
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
