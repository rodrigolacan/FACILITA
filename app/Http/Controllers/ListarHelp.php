<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarHelp extends Controller
{
    public function listarHelp(){
        return view('Logado.Helpdesk.ListarHelp');
    }
}
