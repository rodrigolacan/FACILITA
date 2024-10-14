<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Models\Encurtados;
use App\Models\Invalidos;
use App\Classes\Domains;
use Illuminate\Http\Request;
use App\Providers\LoadInformationUserProvider;

class Main extends Controller
{
    public $long_link;
    public $short_link;
    public $perma_link;
    public $hash_link;
    public $usuario;
    public $data = [
        'ALERTS'=>[],
        'SUCCESS'=>[],

    ];

    public function principal(){
        return view('Logado.encurtador');
    }


/*Uso futuro para verificar domains
    public function verificaDomain($long_link){
        $parse_url = parse_url($long_link, PHP_URL_HOST);
        $domain = new Domains();
        return $domain->getDomainsByName($parse_url);
    }
*/

//Armazena
    public function store($long_link,$perma_link,$usuario){
        $this->long_link = $long_link;
        $this->perma_link = $perma_link;
        $this->usuario = $usuario;
        $table_encurtado = new Encurtados();
        
    //Verifica duplicidade do link longo
        $exist_link = $table_encurtado->where('long_link',$long_link);
        if($exist_link->first()){
            $message = $exist_link->first()->short_link;
            $this->data['ALERTS'] = ['DOMAIN' => 'ESSE LINK JÁ FOI ENCURTADO','LINK'=>$message];
            return false;
        }else{
            
        //Gerar ID único para a tabela
            $randomString = md5(uniqid());
            $numericOnly  = preg_replace('/^[0-9]+$/', '', $randomString);
            $sevenDigits  = substr($numericOnly, 0,5);
            $this->hash_link = $sevenDigits;
            $this->short_link = getenv('APP_URL_UNCUTE').$sevenDigits; 

        //Inserindo valores na tabela
            $table_encurtado->long_link = $this->long_link;
            $table_encurtado->short_link = $this->short_link;
            $table_encurtado->permanencia = $this->perma_link;
            $table_encurtado->usuario = $this->usuario;
            $table_encurtado->hash_link = $this->hash_link;
            $table_encurtado->save();

        //Definindo mensagem de sucesso;
            $message =getenv('APP_URL_UNCUTE').$sevenDigits;
            $this->data['SUCCESS'] = ['CUTED' => 'LINK ENCURTADO COM SUCESSO','LINK'=>$message];
            return true;
        }
        
    

    }

    public function encurtar(Request $request){
        $validation = $request->validate([
            'origin_url'=>'required',
            'perma_link'=>'nullable'
        ]);

        $long_link = $request->input('origin_url');
        $perma_link = false;

        if($request->has('perma_link') == TRUE){
            $perma_link = true;
        }

    
  
    //Se está encurtado
        $iscut = $this->store($long_link,$perma_link,app('userBitrix')['NAME']);
        if(($iscut == false )){
            return redirect()->route('principal')->withErrors($this->data['ALERTS']);
        }
        
            return redirect()->route('principal')->withErrors($this->data['SUCCESS']);
        
      
    }

   
}
