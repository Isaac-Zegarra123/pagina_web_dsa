<nav class="navbar navbar-expand-lg navbar-dark bg-darkred w-100">
    <div class="container-fluid">
        <!-- Menú hamburguesa para dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            
            <div class="nav nav-fill w-100">
                <a class="nav-link text-white" aria-current="page" href="{{ route('welcome') }}"><i class="fas fa-home"></i> Inicio</a>
                <a class="nav-link text-white" href="https://postulaciones.uatf.edu.bo/" target="_blank">
                    <i class="fa-solid fa-user-graduate"></i> Postulaciones
                </a>
                <a class="nav-link text-white" href="#convocatoria"><i class="fas fa-bullhorn"></i> Convocatorias</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        Normativa
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('resolutions') }}" rel="noopener noreferrer" target="_blank"><i class="fas fa-file-alt"></i> Resoluciones de Consejo Universitario</a></li>
                        <li><a class="dropdown-item" href="{{ route('commission') }}" rel="noopener noreferrer" target="_blank"><i class="fas fa-chart-line"></i> Dictamenes de la Comision Academica</a></li>
                        <li><a class="dropdown-item"  href="{{ route('registercircular') }}" rel="noopener noreferrer" target="_blank"><i class="fas fa-graduation-cap"></i> Registro de Diseños Curriculares de Carreras y Programas</a></li>
                        <li><a class="dropdown-item" href="{{ route('circulars') }}" rel="noopener noreferrer" target="_blank"><i class="fas fa-graduation-cap"></i> Circulares, Notas de Instruccion y Comunicados</a></li>
                        <li><a class="dropdown-item" href="{{ route('curricular') }}" rel="noopener noreferrer" target="_blank"><i class="fas fa-graduation-cap"></i> Diseños curriculares</a></li>
                        <li><a class="dropdown-item" href="{{ route('reglamentos') }}" rel="noopener noreferrer" target="_blank"><i class="fas fa-graduation-cap"></i> Reglamentos</a></li>
                    </ul>
                </li>
                <a class="nav-link text-white" href="{{ route('pages.calendar') }}" target="_blank"><i class="fas fa-calendar-alt"></i> Calendario Académico</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i> Estadísticos
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown2">
                        <li><a class="dropdown-item" href="{{ route('commission') }}" target="_blank"><i class="fas fa-chart-line"></i> Estadística</a></li>
                        <li><a class="dropdown-item" href="#" target="_blank"><i class="fas fa-graduation-cap"></i> Información Académica</a></li>
                        <li><a class="dropdown-item" href="#" target="_blank"><i class="fas fa-user-graduate"></i> Titulados</a></li>
                    </ul>
                </li>
                <a class="nav-link text-white" href="/admin/login"><i class="fas fa-sign-in-alt"></i> Login</a>

            </div>
        </div>
    </div>
</nav>
