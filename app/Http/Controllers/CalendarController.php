<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendario; // Usa el nombre correcto del modelo
use App\Models\Year;

class CalendarController extends Controller
{
    public function index(Request $request, $year = null)
    {
        // Determinar el año actual si no se especifica
        $currentYear = $year ?? now()->year;

        // Obtener los años únicos de las circulares (por columna `gestion`) compatible con PostgreSQL
        $years = Calendario::selectRaw('EXTRACT(YEAR FROM gestion) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Filtrar las circulares por el año actual
        $calendars = Calendario::whereRaw('EXTRACT(YEAR FROM gestion) = ?', [$currentYear])->get();

        // Si es una solicitud AJAX, devolver solo la vista parcial
        if ($request->ajax()) {
            return view('partials.calendar', compact('calendars'))->render();
        }

        // Pasar los datos a la vista completa
        return view('pages.calendar', compact('calendars', 'years', 'currentYear'));
    }

    public function download($id)
    {
        $calendar = Calendario::findOrFail($id);
        $filePath = storage_path('app/public/' . $calendar->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'El archivo no se encontró.');
    }
    public function showPdf($id)
{
    // Encuentra el calendario por ID
    $calendar = Calendario::findOrFail($id);

    // Construye la ruta al archivo PDF
    $filePath = storage_path('app/public/' . $calendar->file_path);

    if (file_exists($filePath)) {
        return response()->file($filePath, [
            'Content-Type' => 'application/pdf', // Especifica el tipo MIME
            'Content-Disposition' => 'inline', // Asegura que se muestre en el navegador
        ]);
    }

    return redirect()->back()->with('error', 'El archivo no se encontró.');
}

}
