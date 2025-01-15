<?php

namespace App\Http\Controllers;

use App\Models\Registro;

class RegistroController extends Controller
{
    public function index()
    {
        $registros = Registro::first();

        return view('organigra.registros', compact('registros'));
    }
}
