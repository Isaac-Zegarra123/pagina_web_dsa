<?php

namespace App\Http\Controllers;

use App\Models\GestionCurricular;
use Illuminate\Http\Request;

class GestionCurricularController extends Controller
{
    public function index()
    {
        $GestionCurriculares = GestionCurricular::first(); 
    return view('organigra.gestion', compact('GestionCurriculares'));
    }
}
