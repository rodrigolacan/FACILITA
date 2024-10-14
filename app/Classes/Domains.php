<?php
    namespace App\Classes;

    use App\Models\Invalidos;
    class Domains{
        private $list_domains_read;

        public function __construct(){
            $this->list_domains_read = fopen('C:\Users\rodrigo.lacan\OneDrive - SEBRAE\PESSOAL\Laravel\Encurtador Sebrae\app\Classes\domains.csv','r');
            if ($this->list_domains_read === FALSE) {
                return false;
            }
        }

        public function getDomainsByName($domain):bool {
            // Reinicie o ponteiro do arquivo para o início
            rewind($this->list_domains_read);
        
            while (($data = fgetcsv($this->list_domains_read)) !== FALSE) {
                if (in_array($domain, $data)) {
                    return true;
                }
            }
        
            // Se chegou até aqui, significa que o domínio não foi encontrado
            return false;
        }
    


    }

?>