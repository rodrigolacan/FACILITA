<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Conversor extends Controller
{
    public function conversor(){
        return view('Logado.Conversor.index-conversor');
    }
}
