<?php 

namespace Source\App; 

use CoffeeCode\DataLayer\DataLayer;
use Source\App\Workspace;
use Source\App\Etapa;
use Source\App\EtapaTarefa;
use Source\App\User;

class Tarefa extends DataLayer
{
    function __construct(){
        parent::__construct("tarefa", ["inicio", "fim", "tempo", "titulo", "idworkspace", "idetapatarefa"], "idtarefa", false);
    }

    public function createTask($data){

        $workspaceRepository = new Workspace();
        $etapaRepository = new Etapa();
        $etapaTarefaRepository = new EtapaTarefa();
        $executorRepository = new User();

        $workspace = $workspaceRepository->find("nome = '$data[selectWorkspace]'")->fetch();
        $etapa = $etapaRepository->find("etapa = '$data[selectEtapa]'")->fetch();
        $executor = $executorRepository->find("nome = '$data[selectExecutor]'")->fetch();

        if(!$workspace){
            echo "Não foi possivel encontrar a workspace";
            return;
        }

        if(!$etapa){
            echo "Não foi possivel encontrar a etapa";
            return;
        }

        if(!$executor){
            echo "Não foi possivel encontrar o executor";
            return;
        }

        $etapaTarefaId = $etapaTarefaRepository->createEtapaTarefa($etapa->etapa, $executor->nome);

        if($etapaTarefaId == 0){
            echo "Não foi possivel criar a etapa na tarefa";
            return;
        }

        $this->inicio = $data["inputDataInicio"];
        $this->fim = $data["inputTempofinalizacao"];
        $this->tempo = $data["inputTempo"];
        $this->titulo = $data["inputTitulo"];
        $this->descricao = $data["inputDescricao"];
        $this->idworkspace = $workspace->idworkspace;
        $this->idetapatarefa = $etapaTarefaId;

        $taskId = $this->save();

        if(!$taskId){
            echo "Não foi possivel criar a tarefa";
            return;
        }  

        header("Location: " . URL_BASE );
      


    }

    public function findAllTask(): array{
      
        $AllTasks = $this->find()->fetch(true);
       
        if(!$AllTasks) return ["Não existe tarefas"];
           
        return $AllTasks;
    }

   
    
}