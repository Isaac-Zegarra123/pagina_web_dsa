<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convocatoria;
use App\Models\Carrusel;
use Barryvdh\DomPDF\Facade as PDF;
use Imagick;
use Illuminate\Support\Facades\Storage;

class ConvocatoriaController extends Controller
{
     // Método para mostrar las convocatorias
     public function index(Request $request)
     {
         // Obtener todas las convocatorias de la base de datos
         $convocatorias = Convocatoria::orderBy('created_at', 'desc')->paginate(8);
        
         // Obtener todas las imágenes del carrusel de la base de datos
        $carousels = Carrusel::all();


        foreach ($convocatorias as $convocatoria) {
            $archivo = json_decode($convocatoria->archivo, true);
            if (isset($archivo[0]['download_link'])) {
                $pdfPath = storage_path('app/public/' . $archivo[0]['download_link']);
                $imagePath = 'images/convocatorias/' . basename($archivo[0]['download_link'], '.pdf') . '.jpg';

                if (!Storage::exists('public/' . $imagePath)) {
                    $this->convertPdfToImage($pdfPath, storage_path('app/public/' . $imagePath));
                }

                $convocatoria->image = asset('storage/' . $imagePath);
            } else {
                $convocatoria->image = null;
            }
        }


        if ($request->ajax()) {
            return view('partials.convocatorias', compact('convocatorias'))->render();
        }
        // Pasar las convocatorias y el carrusel a la vista
        return view('welcome', compact('convocatorias', 'carousels'));
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

}
