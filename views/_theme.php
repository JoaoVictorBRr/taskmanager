<?php 

session_start();

if (!isset($_SESSION['user_login'])) {

    header("Location: " . URL_BASE . "/account/login");
    exit;
    
}

?>

<!DOCTYPE html>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/css/styles.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title> <?=$title; ?> </title>
</head>
<body>

<header >
    <div class="header">
        <a href="index.php">
            <div>
                <p class="name-system">TASK</p>
                <p class="name-system">MANAGER</p>
            </div>
        </a>
       
        <div class="user">
            <img class="user-img" src="./banco-Imagens/<?= $_SESSION['user_foto'] ?>.png" alt="user-img">
            <p onclick="openMenu()" class="user-name"><?= $_SESSION['user_nome'] ?></p>
            <span class="option-div" style="display: none">
                <a class="option-link" href="<?= URL_BASE ."/perfil" ?>">Conta</a>
                <a class="option-link" href="<?= URL_BASE ."/" ?>">Tarefas</a>
                <a class="option-link" href="<?= URL_BASE ."/usuarios" ?>">Usuarios</a>
                <a class="option-link" href="<?= URL_BASE ."/etapa" ?>">Etapa</a>
                <a class="option-link" href="<?= URL_BASE ."/workspace" ?>">Workspace</a>
                <a class="option-link" href="<?= URL_BASE ."/account/sair" ?>">Sair</a>
            </span>
        </div>

    </div>
</header>

