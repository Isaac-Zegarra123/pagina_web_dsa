<?php

namespace App\Http\Controllers;

use App\Models\BienestarUniversitario;

class BienestarUniversitarioController extends Controller
{
    public function index()
    {
        $BienestarUniversitarios = BienestarUniversitario::first();

        return view('organigra.bienestar', compact('BienestarUniversitarios'));
    }
}
