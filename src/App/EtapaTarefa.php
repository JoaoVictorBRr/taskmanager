<?php 

namespace Source\App;

use CoffeeCode\DataLayer\DataLayer;

class EtapaTarefa extends DataLayer{

    function __construct(){
        parent::__construct("etapatarefa", [ "etapa", "executor"], "idetapatarefa", false);
      
    }

    public function createEtapaTarefa(string $etapa, string $executor): int 
    {
        

     $this->etapa = $etapa;
     $this->executor = $executor;
   
     $idTarefa = $this->save();
     
    
     if(!$idTarefa){
        echo "Não foi possivel criar a tarefa";
        return 0;
     }
     
     return $idTarefa;


    }

    public function findEtapaById($id): object{
        
       $etapa = $this->findById($id);
       
       if(!$etapa){
        return "Etapa não encontrada";
       }
  
       return $etapa;

    }



}