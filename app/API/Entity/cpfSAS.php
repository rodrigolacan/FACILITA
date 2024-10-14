<?php
namespace App\API\Entity;
use App\API\Origin\Origin as Origin;
use Illuminate\Support\Facades\Http;
use stdClass;

class cpfSAS extends Origin{

    public function getCpf($cpf){
        $header = json_decode(getenv('HEADER_SAS'), true);
        $this->setAPI(getenv('ENDPOINT_SAS'),null,'?CgcCpf='.$cpf);

        return $this->httpHeaders($header);
    }
}
