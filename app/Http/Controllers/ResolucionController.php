<?php

namespace App\Http\Controllers;

use App\Models\Resolucione;
use Illuminate\Http\Request;

class ResolucionController extends Controller
{
    public function index(Request $request, $year = null)
    {
        // Determinar el año actual si no se especifica
        $currentYear = $year ?? now()->year;

        // Obtener los años únicos de las circulares (por columna `fecha_publicacion`) compatible con PostgreSQL
        $years = Resolucione::selectRaw('EXTRACT(YEAR FROM fecha_publicacion) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Filtrar las circulares por el año actual
        $resoluciones = Resolucione::whereRaw('EXTRACT(YEAR FROM fecha_publicacion) = ?', [$currentYear])->get();

        // Si es una solicitud AJAX, devolver solo la vista parcial
        if ($request->ajax()) {
            return view('partials.resoluciones', compact('resoluciones'))->render();
        }

        // Pasar los datos a la vista completa
        return view('pages.resolutions', compact('resoluciones', 'years', 'currentYear'));
    }

    public function download($id)
    {
        $resoluciones = Resolucione::findOrFail($id);
        $filePath = storage_path('app/public/' . $resoluciones->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'El archivo no se encontró.');
    }
}
