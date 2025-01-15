<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PDFReporteController extends Controller
{
    public function generarReporte($tabla)
    {
        // Verifica si la tabla existe en la base de datos
        if (! Schema::hasTable($tabla)) {
            abort(404, 'La tabla no existe');
        }

        // Obtén todos los datos de la tabla
        $data = DB::table($tabla)->get();

        // Verifica que haya datos en la tabla para evitar errores
        if ($data->isEmpty()) {
            return back()->with('error', 'La tabla no contiene datos.');
        }

        // Crea el PDF con la vista y los datos
        $pdf = PDF::loadView('reportes', [
            'data' => $data,
            'tabla' => $tabla,
            'columnas' => Schema::getColumnListing($tabla),
        ]);

        // Devuelve el PDF en el navegador
        return $pdf->stream("reporte_{$tabla}.pdf");
    }
}
