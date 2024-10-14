<?php
namespace App\API\Origin;

use Illuminate\Support\Facades\Http;
use Exception;

class Origin
{
    private $API = [
        'endpoint' => null,
        'key'      => null,
        'methods'  => null,
        'headers' =>  null
    ];

    public function getAPI(){
        return $this->API;
    }

    public function setAPI($endpoint,$key = null,$methods){
        $this->API['endpoint'] = $endpoint;
        $this->API['key']      = $key;
        $this->API['methods']  = $methods;
    }


    public function createAPIConnection($completeUrl = null)
    {
        try{

            $url = ($completeUrl == null) ? $this->API['endpoint'] . $this->API['key'] . $this->API['methods'] : $completeUrl;
            $response = Http::withOptions(['verify' => false])->get($url);

            if($response->successful()) {

                $json = $response->json();
                return  $json;

            } else {
                return [
                    'status'=>false,
                    'message'=>$response->status()
                ];
            }

        }catch(Exception $erro){
            return [
                'status'=>false,
                'message'=>"Ocorreu um erro: " . $erro->getMessage()
            ];
        }

    }

    public function postRequest(Array $data){
        $url = $this->API['endpoint'] . $this->API['key'] . $this->API['methods'];

        try{
            $response = Http::withOptions(['verify' => false])->post($url, $data);

            if ($response->successful()) {
                //$responseData = $response->json();
                return true;
            } else {
                //$errorResponse = $response->json();
                return false;
            }
            
        }catch (Exception $erro) {
            return [
                'status'=>false,
                'message'=>"Ocorreu um erro: " . $erro->getMessage()
            ];
        }

    }

    public function httpHeaders(Array $headers){
        $url =  $this->API['endpoint'] . $this->API['key'] . $this->API['methods'];

        $http = Http::withoutVerifying()->withHeaders($headers)->get($url);

        if($http->successful()){
            return $http->json();
        }else{
            return ['status' => $http->status()];
        }

    }


}