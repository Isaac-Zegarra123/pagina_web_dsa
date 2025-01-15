<?php

namespace App\Http\Controllers;

use App\Models\Mensajero;

class MensajeroController extends Controller
{
    public function index()
    {
        $Mensajeros = Mensajero::first();

        return view('organigra.mensajero', compact('Mensajeros'));
    }
}
