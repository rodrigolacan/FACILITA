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
        
        $long_link = Encurtados::where('hash_link', $short_link)->select('long_link','id')->first();
        
        if (!($long_link)) {
            return view('Errors.404');
        }

        // Usando o relacionamento para buscar ou criar a estatística
        $estatisticas = Estatisticas::where('id_encurtados', $long_link->id)->first();

        if ($estatisticas) {
            $estatisticas->increment('acessos'); // Incrementa o número de acessos
        } else {
            // Se não existe, cria uma nova estatística para o link
            Estatisticas::create([
                'id_encurtados' => $long_link->id,
                'acessos' => 1
            ]);
        }

        return redirect($long_link->long_link);
    }
    
    
}
