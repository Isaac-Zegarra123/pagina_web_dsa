<?php

namespace App\Http\Controllers;

use App\Models\Registro_Curricular;
use Illuminate\Http\Request;

class Registro_CurricularController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de la tabla 'registro_curricular'
        $registro_curricular = Registro_Curricular::where('activo', 'SI')->get();

        // Pasa la variable a la vista
        return view('pages.registercircular', compact('registro_curricular'));
    }
}
