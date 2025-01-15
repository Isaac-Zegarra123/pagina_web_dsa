<?php

namespace App\Http\Controllers;

use App\Models\AlbergueUniversitario;

class AlbergueUniversitarioController extends Controller
{
    public function index()
    {
        $AlbergueUniversitario = AlbergueUniversitario::first();

        return view('organigra.encargado', compact('AlbergueUniversitario'));
    }
}
