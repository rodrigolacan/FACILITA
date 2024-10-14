<?php
namespace App\API\Entity;
use App\API\Origin\Origin as Origin;
use stdClass;

class Unidades extends Origin{

    public function getUnits(){
        $this->setAPI(getenv('ENDPOINT_UNIT'),getenv('API_KEY_UNIT'),getenv('METHODS_UNIT'));
        return ($this->createAPIConnection());
    }
}
