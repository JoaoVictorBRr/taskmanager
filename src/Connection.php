<?php

define("URL_BASE", "http://localhost/taskmanager");

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "taskmanager",
    "username" => "root",
    "passwd" => "sua senha aqui",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //Padrão de caracteres
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Objeto para obter mensagem de erro
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //Todo resultado que eu trouxer do banco de dados já vem em objeto
        PDO::ATTR_CASE => PDO::CASE_NATURAL 
    ]
]);
