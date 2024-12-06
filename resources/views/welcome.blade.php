<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>D.S.A</title>
    @vite(['resources/routes/route.js', 'resources/css/routes/routes.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body>
    
    <div class="">
        @include('layouts.nav')
        
        <div class="">
            @include('layouts.carrusel', ['carousels' => $carousels])
            @include('layouts.header')
            @include('layouts.admin', ['convocatorias' => $convocatorias])
        </div>
        @include('layouts.footer')
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Manejar la paginación usando AJAX
$(document).on('click', '.pagination a', function(event) {
    event.preventDefault(); // Previene la redirección del enlace

    let url = $(this).attr('href'); // Obtiene la URL de la paginación
    fetchPaginatedData(url); // Llama a la función para cargar los datos
});

function fetchPaginatedData(url) {
    $.ajax({
        url: url,
        type: 'GET',
        success: function(data) {
            // Reemplaza el contenido del contenedor con la nueva sección
            $('#convocatorias-container').html(data);
        },
        error: function(xhr, status, error) {
            console.error('Error al cargar las convocatorias:', error);
        }
    });
}

    </script>
</body>
</html>