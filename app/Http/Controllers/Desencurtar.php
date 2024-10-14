<?php

namespace App\Http\Controllers;

use App\Models\Encurtados;
use App\Models\Estatisticas;
use Illuminate\Http\Request;

class Desencurtar extends Controller
{
    /*A CONSULTA A BAIXO NÃO RESPEITA O CASE-SENSITIVE
    public function desencurtar($id)
    {
        $encurtados = new Encurtados();
        $short_link = $id;

        $long_link = $encurtados->where('short_link', $short_link)->select('long_link')->first();


        if (!$long_link) {
            return view('Invalidos');
        }

        return redirect($long_link->long_link);
    }*/


    //A CONSULTA A BAIXO RESPEITA CASE-SENSITIVE
    public function desencurtar($id)
    {
        $short_link = $id;

        if (!preg_match('/^[a-zA-Z0-9]{5}$/', $id)) {
            return view('Errors.404');
        }
        
        $long_link = Encurtados::whereRaw("hash_link COLLATE Latin1_General_CS_AS = ?", [$short_link])->select('long_link','id')->first();
        
        if (!($long_link)) {
            return view('Errors.404');
        }

        $estatisticas = new Estatisticas;
        $estatisticas = $estatisticas->where('id_encurtados',$long_link->id)->select('acessos');
        $estatisticas->increment('acessos');
        

        return redirect($long_link->long_link);
    }
    
    
}
