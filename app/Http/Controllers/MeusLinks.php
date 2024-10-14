<?php

namespace App\Http\Controllers;

use App\Models\Encurtados;
use Illuminate\Http\Request;

class MeusLinks extends Controller
{
    public function index(){
        $links = Encurtados::where('usuario',app('userBitrix')['NAME'])->paginate(5);
        
        return view('Logado.Encurtador.meusLinks', compact('links'));
    }

    public function buscarLink(Request $request){
        if(!$request->input('busca-meus-links')){
           return redirect()->route('meusLinks');
        }

        $query = $request->input('busca-meus-links');

        $links = Encurtados::where('short_link', 'like', "%$query%")
                      ->where('usuario',app('userBitrix')['NAME'])
                      ->orWhere('long_link', 'like', "%$query%")
                      ->paginate(5);

        return view('Logado.Encurtador.meusLinks', compact('links'));
    }
}
