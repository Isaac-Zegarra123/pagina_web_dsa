<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    public function index()
    {
        $Secretarias = Secretaria::first(); 
    return view('organigra.secretaria', compact('Secretarias'));
    }
}
