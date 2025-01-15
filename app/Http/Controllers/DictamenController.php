<?php

namespace App\Http\Controllers;

use App\Models\Dictamen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagick;

class DictamenController extends Controller
{
    public function index(Request $request, $year = null)
    {
        // Determinar el año actual si no se especifica
        $currentYear = $year ?? now()->year;

        // Obtener los años únicos de las circulares (por columna `fecha_publicacion`) compatible con PostgreSQL
        $years = Dictamen::selectRaw('EXTRACT(YEAR FROM fecha_publicacion) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Filtrar las circulares por el año actual
        $dictamenes = Dictamen::whereRaw('EXTRACT(YEAR FROM fecha_publicacion) = ?', [$currentYear])->get();

        // Procesar cada circular para convertir el PDF en imagen
        foreach ($dictamenes as $dictamen) {
            $archivo = json_decode($dictamen->archivo, true);

            if (isset($archivo[0]['download_link'])) {
                $pdfPath = storage_path('app/public/' . $archivo[0]['download_link']);
                $imagePath = 'images/dictamen/' . basename($archivo[0]['download_link'], '.pdf') . '.jpg';

                // Verificar si la imagen ya existe, si no, convertir el PDF en imagen
                if (! Storage::exists('public/' . $imagePath)) {
                    $this->convertPdfToImage($pdfPath, storage_path('app/public/' . $imagePath));
                }

                // Asignar la URL de la imagen al objeto circular
                $dictamen->image = asset('storage/' . $imagePath);
            } else {
                $dictamen->image = null;
            }
        }

        // Si es una solicitud AJAX, devolver solo la vista parcial
        if ($request->ajax()) {
            return view('partials.dictamenes', compact('dictamenes'))->render();
        }

        // Pasar los datos a la vista completa
        return view('pages.commission', compact('dictamenes', 'years', 'currentYear'));
    }

    private function convertPdfToImage($pdfPath, $imagePath)
    {
        try {
            $imagick = new Imagick();
            $imagick->setResolution(300, 300);
            $imagick->readImage($pdfPath . '[0]'); // Solo la primera página
            $imagick->setImageFormat('jpeg');
            $imagick->writeImage($imagePath);
            $imagick->clear();
            $imagick->destroy();
        } catch (\Exception $e) {
            \Log::error('Error converting PDF to image: ' . $e->getMessage());
        }
    }

    public function download($id)
    {
        $dictamenes = Dictamen::findOrFail($id);
        $filePath = storage_path('app/public/' . $resoluciones->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'El archivo no se encontró.');
    }
}
