<?php 

namespace Source\App;

use CoffeeCode\DataLayer\DataLayer;

class Workspace extends DataLayer{

    function __construct(){
        parent::__construct("workspace", ["nome"], "idworkspace", false);
    }

    public function findWorkSpaceById($id){
       $workSpace = $this->findById(intval($id));   
       if(!$workSpace){
        echo "WorkSpace não encontrada";
        return;
       }
      
       return $workSpace;
    }

    public function createWorkSpace($data): void{

        $this->nome = $data["nome"];
        $this->foto = $data["foto"];

        $workSpace = $this->save();

        if(!$workSpace){
            echo "ErrCreateWorkSpace";
            return;
        }

        header("Location: " . URL_BASE . "/workspace");
        return;

    }

    public function deleteWorkSpace($data): void{

        $workSpace = $this->findById($data["id"]);
        
        if($workSpace) { $workSpace->destroy(); echo "WorkSpace excluida"; return; }
        else { echo "ErrDeleteWorkspace"; return; }
     
    }

    public function findAllWorkspaces(): array{
        $AllWorkSpace = $this->find()->fetch(true);

        if(!$AllWorkSpace) return ["Não existe nenhuma workspace"];

        return $AllWorkSpace;
    }

}