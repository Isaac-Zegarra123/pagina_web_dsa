<?php

namespace App\Http\Controllers;

class CarouselController extends Controller
{
    public function index()
    {
        $carousels = Carousel::all();  // Obtener todas las imágenes del carrusel

        return view('layouts.carrusel', compact('carrusel'));
    }
}
