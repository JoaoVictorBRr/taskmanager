<?php 

namespace Source\App; 

use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer
{

     function __construct() {
      
      parent::__construct("usuario", ["email", "nome", "senha", "tipoconta"], "idusuario", false);

    }

    public function startSessionUser($data): void {

      $user = $this->find("email = '$data[email]' AND senha = '$data[password]'")->fetch();
    
      if($user->email && $user->senha){
       
        // Evita uso de comandos js para tentar entrar na sessão 
        session_set_cookie_params(['httponly' => true]);

        session_start();
        
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nome'] = $user->nome;
        $_SESSION['user_foto'] = $user->foto;
        $_SESSION['user_id'] = $user->idusuario;
        $_SESSION['user_login'] = 1;

        header("Location: " . URL_BASE );

  
      } 
    
    }

    public function logOut(){

      session_start();
      session_destroy();
      header("Location: " . URL_BASE . "/account/login");
      exit;

    }

    public function createUser($data): void {

        $LetrasMaiusculas = "?=(?:.*[A-Z])";
        $LetrasMinusculas = "?=(?:.*[a-z])";
        $Digitos = "?=(?:.*\d)";
        $QuantidadeDeCaracteres = "[A-Za-z\d]";

        if(!preg_match("/^($LetrasMaiusculas{1})($LetrasMinusculas{1})($Digitos{1})($QuantidadeDeCaracteres{8})$/" , $data["senha"])){
          echo "ErrPassword";
          return;
        }

        $this->email = $data["email"];
        $this->nome = $data["nome"];
        $this->foto = "foto";
        $this->senha = $data["senha"];
        $this->tipoconta = $data["tipoDeConta"];

        $this->save();

        $userId = $this->save();
    

        if(!$userId){
    
          echo "ErrUser";
          return;
        }

        echo "Sucesso";
        return;
     
    }

    public function findAllUsers(): array{
      
      $allUsers = $this->find()->fetch(true);

      if(!$allUsers) return ["Não existem usuarios"];
      
      return $allUsers;
    }

    public function findUserLogged(): object{
      
    $user = $this->findById($_SESSION['user_id']);
    return $user;

    }


    public function deleteUser($data): void{

      $user = $this->findById($data["id"]);
      if($user) { $user->destroy(); echo "Usuario excluido"; return; }
      else { echo "ErrDeleteUser"; return; }
    
      
    }

  

}