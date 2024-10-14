<?php
namespace App\API\Entity;
use App\API\Origin\Origin as Origin;
use stdClass;

class Departaments extends Origin{

    public function getDepartaments(){
        $this->setAPI(getenv('ENDPOINT_DEPARTAMENT'),getenv('API_KEY_DEPARTAMENT'),getenv('METHODS__DEPARTAMENT_GET'));
        return ($this->createAPIConnection()['result']);
    }
}