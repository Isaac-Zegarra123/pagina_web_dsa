<?php

namespace App\Http\Controllers;

use App\Models\Circular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Imagick;

class CircularController extends Controller
{
    public function index(Request $request, $year = null)
    {
        // Determinar el año actual si no se especifica
        $currentYear = $year ?? now()->year;

        // Obtener los años únicos de las circulares (por columna `fecha_publicacion`) compatible con PostgreSQL
        $years = Circular::selectRaw('EXTRACT(YEAR FROM fecha_publicacion) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Filtrar las circulares por el año actual
        $circulares = Circular::whereRaw('EXTRACT(YEAR FROM fecha_publicacion) = ?', [$currentYear])->get();

        // Procesar cada circular para convertir el PDF en imagen
        foreach ($circulares as $circular) {
            $archivo = json_decode($circular->archivo, true);

            if (isset($archivo[0]['download_link'])) {
                $pdfPath = storage_path('app/public/' . $archivo[0]['download_link']);
                $imagePath = 'images/circular/' . basename($archivo[0]['download_link'], '.pdf') . '.jpg';

                // Verificar si la imagen ya existe, si no, convertir el PDF en imagen
                if (! Storage::exists('public/' . $imagePath)) {
                    $this->convertPdfToImage($pdfPath, storage_path('app/public/' . $imagePath));
                }

                // Asignar la URL de la imagen al objeto circular
                $circular->image = asset('storage/' . $imagePath);
            } else {
                $circular->image = null;
            }
        }

        // Si es una solicitud AJAX, devolver solo la vista parcial
        if ($request->ajax()) {
            return view('partials.circular', compact('circulares'))->render();
        }

        // Pasar los datos a la vista "pages/circulars"
        return view('pages.circulars', compact('circulares', 'years', 'currentYear'));
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
        $circular = Circular::findOrFail($id);
        $filePath = storage_path('app/public/' . $circular->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'El archivo no se encontró.');
    }
}
