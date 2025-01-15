<?php

namespace App\Http\Controllers;

use App\Models\Registro_Curricular;

class RegistroCurricularController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de la tabla 'registro_curricular'
        $registroCurricular = Registro_Curricular::where('activo', 'SI')->get();

        // Pasa la variable a la vista
        return view('pages.registercircular', compact('registroCurricular'));
    }
}
