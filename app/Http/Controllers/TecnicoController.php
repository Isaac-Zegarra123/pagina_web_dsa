<?php

namespace App\Http\Controllers;

use App\Models\TecnicoInformatico;

class TecnicoController extends Controller
{
    public function index()
    {
        $TecnicoInformaticos = TecnicoInformatico::first();

        return view('organigra.tecnico', compact('TecnicoInformaticos'));
    }
}
