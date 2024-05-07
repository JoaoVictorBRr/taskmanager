<?php 

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("Source\App");

// Rotas para as páginas internas que preciasm de acesso

$router->group(null);

$router->get("/", "Task:tasksPage");
$router->get("/etapa", "Task:etapasPage");
$router->get("/usuarios", "Task:usuariosPage");
$router->get("/workspace", "Task:workspacePage");

// Rotas de criação 

$router->group("create");

$router->post("/task", "Tarefa:createTask");
$router->post("/user", "User:createUser");
$router->post("/etapa", "Etapa:createEtapa");
$router->post("/workspace", "Workspace:createWorkSpace");

// Rotas para deletar

$router->group("delete");

$router->delete("/user/{id}", "User:deleteUser");
$router->delete("/etapa/{id}", "Etapa:deleteEtapa");
$router->delete("/workspace/{id}", "Workspace:deleteWorkSpace");

// Rota de login

$router->group("account");

$router->get("/login", "Task:loginPage");
$router->get("/sair", "User:logOut");
$router->post("/verificaLogin", "User:startSessionUser");

//Rotas de erro

$router->group("ops");

$router->get("/{errcode}", "Task:err");

///////////////////////////

$router->dispatch();

if($router->error()){
    $router->redirect("/ops/{$router->error()}");
}