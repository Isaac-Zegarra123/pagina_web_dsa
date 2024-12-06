<?php

namespace App\Http\Controllers;

use App\Models\TecnicoInformatico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        $TecnicoInformaticos = TecnicoInformatico::first(); 
        return view('organigra.tecnico', compact('TecnicoInformaticos'));
    }
}
