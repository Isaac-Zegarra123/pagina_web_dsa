<?php

namespace App\Http\Controllers;

use App\Models\CordinadorAcdemic; // Usa el nombre correcto del modelo
use Illuminate\Http\Request;

class CordinadorAcdemicController extends Controller
{
    public function index()
    {
        $cordinadorAcademicos = CordinadorAcdemic::first(); 
        return view('organigra.cordinador', compact('cordinadorAcademicos'));
    }
}
