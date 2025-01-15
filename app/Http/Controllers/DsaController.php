<?php

namespace App\Http\Controllers;

use App\Models\Dsa;

class DsaController extends Controller
{
    public function index()
    {
        // Obtener el primer registro de la tabla 'd_s_a'
        $dsa = Dsa::first();

        return view('organigra.servi_academ', compact('dsa'));
    }
}
