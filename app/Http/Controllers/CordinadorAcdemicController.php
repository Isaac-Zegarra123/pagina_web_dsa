<?php

namespace App\Http\Controllers;

use App\Models\CordinadorAcdemic;

// Usa el nombre correcto del modelo

class CordinadorAcdemicController extends Controller
{
    public function index()
    {
        $cordinadorAcademicos = CordinadorAcdemic::first();

        return view('organigra.cordinador', compact('cordinadorAcademicos'));
    }
}
