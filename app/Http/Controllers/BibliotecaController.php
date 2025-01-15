<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;

class BibliotecaController extends Controller
{
    public function index()
    {
        // Obtener el primer registro de la tabla 'bibliotecas'
        $biblioteca = Biblioteca::first(); // Variable en singular

        return view('organigra.bibliotecas', compact('biblioteca')); // Usar 'biblioteca' en singular
    }
}
