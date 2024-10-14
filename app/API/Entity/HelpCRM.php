<?php
namespace App\API\Entity;
use App\API\Origin\Origin as Origin;
use stdClass;

class HelpCRM extends Origin{

    private $arrayData = [];

    public function __construct($data){
        $this->arrayData = $data;
    }

    public function method_add_crm(){
        $this->setAPI(getenv('ENDPOINT_CRM'),getenv('API_KEY_CRM'),getenv('METHODS_CRM_ADD'));
        $statusRequest = $this->postRequest($this->arrayData);
        
        return ($statusRequest);
    }
}
