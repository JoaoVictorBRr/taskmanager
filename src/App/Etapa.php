<?php 

namespace Source\App;

use CoffeeCode\DataLayer\DataLayer;

class Etapa extends DataLayer{

    function __construct(){
        parent::__construct("etapa", ["etapa"], "idetapa", false);
    }

    public function findAllEtapas(): array{

        $etapa = $this->find()->fetch(true);
        if(!$etapa) return ["Não existe tarefas"];
        return $etapa;

    }

    public function createEtapa($data): void{
        
        $this->etapa = $data["etapa"];

        $etapaId = $this->save();

        if(!$etapaId){
    
          echo "ErrEtapa";
          return;
        }

        header("Location: " . URL_BASE . "/etapa" );
        return;


    }

    public function deleteEtapa($data): void{
        
        $etapa = $this->findById($data["id"]);

        if(!$etapa){
            echo "ErrDeleteUser";
            return;
        }

        $etapa->destroy();


    }

 

}
