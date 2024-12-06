<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
 // Verifica que esta línea esté bien
use App\Models\Convocatoria; 
use App\Models\Circular;
use App\Models\Dictamen;
use App\Models\Resolucione;
use App\Models\DCurricular;

class ReporteController extends Controller
{
    public function generatePdf($slug)
    {
        // Define los modelos asociados a cada slug
        $models = [
            'convocatorias' => Convocatoria::class,
            'circular' => Circular::class,
            'dictamen' => Dictamen::class,
            'resoluciones' => Resolucione::class,
            'd-curricular' => DCurricular::class,
        ];

        // Verifica que el slug proporcionado tenga un modelo asociado
        if (!isset($models[$slug])) {
            abort(404, 'Modelo no encontrado');
        }

        // Obtiene los datos del modelo correspondiente
        $modelClass = $models[$slug];
        $data = $modelClass::all();

        // Genera el PDF usando la vista 'reportes/reportes.blade.php'
        $pdf = PDF::loadView('reportes.reportes', compact('data', 'slug'));

        // Muestra el PDF en el navegador
        return $pdf->stream($slug . '_reporte.pdf');
    }
}
