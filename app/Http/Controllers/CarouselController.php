<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();  // Obtener todas las imágenes del carrusel
        return view('layouts.carrusel', compact('carrusel'));
    }
}
