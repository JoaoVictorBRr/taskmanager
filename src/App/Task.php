<?php

namespace Source\App;

use League\Plates\Engine;
use Source\App\Tarefa;
use Source\App\Workspace;
use Source\App\EtapaTarefa;

class Task 
{

    private $view;
    private $contentWorkSpace;
    private $contentTask;
    private $contentEtapaTarefa;
    private $contentUser;
    private $contentEtapa;

     
    function __construct(){
        $this->view = new Engine(dirname(dirname(__DIR__)) . "/views", "php");
        $this->contentWorkSpace = new Workspace();
        $this->contentTask = new Tarefa();
        $this->contentEtapaTarefa = new EtapaTarefa();
        $this->contentUser = new User();
        $this->contentEtapa = new Etapa();
    }

    public function tasksPage(){


        echo $this->view->render("_theme", ["title" => "Tarefas", "user" => $this->contentUser]);
        echo $this->view->render("index", ["contentTask" => $this->contentTask->findAllTask(), "contentWorkSpace" => $this->contentWorkSpace, "contentEtapaTarefa" => $this->contentEtapaTarefa, "contentEtapa" => $this->contentEtapa->findAllEtapas(), "contentUser" => $this->contentUser->findAllUsers()]);
        echo $this->view->render("footer");

      

    }

    public function etapasPage(){

        echo $this->view->render("_theme", ["title" => "Etapas", "user" => $this->contentUser]);
        echo $this->view->render("etapa", ["AllEtapas" => $this->contentEtapa->findAllEtapas()]);
        echo $this->view->render("footer");

    }

    public function usuariosPage(){

        echo $this->view->render("_theme", ["title" => "Usuários"]);
        echo $this->view->render("usuario", ["allUsers" => $this->contentUser->findAllUsers()]);
        echo $this->view->render("footer");

    }

    public function workspacePage(){

        echo $this->view->render("_theme", ["title" => "Workspace", "user" => $this->contentUser]);
        echo $this->view->render("workspace", ["AllWorkspaces" => $this->contentWorkSpace->findAllWorkspaces()]);
        echo $this->view->render("footer");

    }

    public function loginPage(){
        echo $this->view->render("login");
    }


    public function err($data){

        echo $this->view->render("err", ["err" => $data["errcode"]]);

        
    }

 

}