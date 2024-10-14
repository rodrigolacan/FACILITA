<?php
namespace App\API\Entity;
use App\API\Origin\Origin as Origin;
use stdClass;

class UserBitrix extends Origin{

    public function getUsers($username){
        $this->setAPI(getenv('ENDPOINT_USER'),getenv('API_KEY_USER'),"user.get.json?FILTER[EMAIL]=$username%");
        return ($this->createAPIConnection());
    }

    public function allUsers(){
        $this->setAPI(getenv('ENDPOINT_USER'),getenv('API_KEY_USER'),"user.get.json");
        return ($this->createAPIConnection()['result']);
    }
}
