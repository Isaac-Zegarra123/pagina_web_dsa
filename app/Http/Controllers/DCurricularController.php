<?php

namespace App\Http\Controllers;

use App\Models\DCurricular;
use App\Models\Year;
use Illuminate\Http\Request;

class DCurricularController extends Controller
{
    public function index(Request $request, $year = null)
    {
        // Determinar el año actual si no se especifica
        $currentYear = $year ?? now()->year;

        // Obtener los años únicos de las circulares (por columna `fecha_publicacion`) compatible con PostgreSQL
        $years = DCurricular::selectRaw('EXTRACT(YEAR FROM fecha_publicacion) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Filtrar las circulares por el año actual
        $curriculares = DCurricular::whereRaw('EXTRACT(YEAR FROM fecha_publicacion) = ?', [$currentYear])->get();

        // Si es una solicitud AJAX, devolver solo la vista parcial
        if ($request->ajax()) {
            return view('partials.curriculares', compact('curriculares'))->render();
        }

        // Pasar los datos a la vista completa
        return view('pages.curricular', compact('curriculares', 'years', 'currentYear'));
    }

    public function download($id)
    {
        $curriculares = DCurricular::findOrFail($id);
        $filePath = storage_path('app/public/' . $DCurricular->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'El archivo no se encontró.');
    }    
}
