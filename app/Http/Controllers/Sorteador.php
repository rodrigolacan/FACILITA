<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Sorteador extends Controller
{
    public function sortear(){
        return view('Logado.sorteador');
    }

    public function sortearPost(Request $request){

        if($request->input('tipo') == 'sortearNomes'){
            $request->validate([
                'sorteadorNomes' => ['required', 'string','min:10']
            ]);

            
            $namesArray = explode("\n",$request->input('sorteadorNomes'));
            $nameSorted = $namesArray[rand(0,count($namesArray) - 1)];

            return redirect()->route('sorteador')->with('sortedName', $nameSorted);

        }
        
        if($request->input('tipo') == 'sortearNumeros'){
            $request->validate([
                'numeroMaximo' => ['required','numeric'],
                'numeroMinimo' => ['required','numeric']
            ]);
    
            $numberSorted = rand($request->input('numeroMinimo'),$request->input('numeroMaximo'));
            return redirect()->route('sorteador')->with('sortedNumber', $numberSorted);
        }
        
        
        
    }
}
