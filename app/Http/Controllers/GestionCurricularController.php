<?php

namespace App\Http\Controllers;

use App\Models\GestionCurricular;

class GestionCurricularController extends Controller
{
    public function index()
    {
        $GestionCurriculares = GestionCurricular::first();

        return view('organigra.gestion', compact('GestionCurriculares'));
    }
}
