<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte PDF</title>
    <style>
        @page { 
            size: letter; 
            margin: 20px; 
        }
        body { 
            font-family: Arial, sans-serif; 
            font-size: 10px;
        }
        h1 { 
            text-align: center; 
            font-size: 16px;
            margin-bottom: 20px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            table-layout: fixed;
        }
        table, th, td { 
            border: 1px solid black; 
        }
        th, td { 
            padding: 5px; 
            text-align: left;
            word-wrap: break-word;
            font-size: 10px;
        }
        th { 
            background-color: #f2f2f2; 
        }
        
        /* Limitar el ancho de columnas para evitar desbordamiento */
        .col-id { width: 5%; }
        .col-titulo { width: 30%; }
        .col-archivo { width: 30%; }
        .col-fecha-inicio, .col-fecha-fin, .col-n-circular, .col-fecha-publicacion { width: 15%; }

        /* Estilo para añadir un salto de página */
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h1>Reporte de {{ ucfirst($slug) }}</h1>
    <table>
        <thead>
            <tr>
                <th class="col-id">ID</th>
                <th class="col-titulo">Título</th>
                <th class="col-archivo">Archivo</th>
                @if($slug === 'convocatorias')
                    <th class="col-fecha-inicio">Fecha de Inicio</th>
                    <th class="col-fecha-fin">Fecha Fin</th>
                @else
                    <th class="col-n-circular">N Circular</th>
                    <th class="col-fecha-publicacion">Fecha de Publicación</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->titulo }}</td>
                    <td>{{ $item->archivo }}</td>
                    
                    @if($slug === 'convocatorias')
                        <td>{{ $item->fecha_inicio ?? 'N/A' }}</td>
                        <td>{{ $item->fecha_fin ?? 'N/A' }}</td>
                    @else
                        <td>{{ $item->n_circular ?? 'N/A' }}</td>
                        <td>{{ $item->fecha_publicacion ?? 'N/A' }}</td>
                    @endif
                </tr>

                {{-- Agregar un salto de página cada 20 registros para evitar desbordamientos --}}
                @if($loop->iteration % 20 == 0)
                    </tbody>
                </table>
                <div class="page-break"></div>
                <table>
                <thead>
                    <tr>
                        <th class="col-id">ID</th>
                        <th class="col-titulo">Título</th>
                        <th class="col-archivo">Archivo</th>
                        @if($slug === 'convocatorias')
                            <th class="col-fecha-inicio">Fecha de Inicio</th>
                            <th class="col-fecha-fin">Fecha Fin</th>
                        @else
                            <th class="col-n-circular">N Circular</th>
                            <th class="col-fecha-publicacion">Fecha de Publicación</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
