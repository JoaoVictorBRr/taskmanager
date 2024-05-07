<?php 

function creteToken(){

// Tipo de token e algoritimo utilizado
$header = [
    'alg' => 'HS256',
    'typ' => 'JWT'
];
$header = json_encode($header);
$header = base64_encode($header);

///////////////////////////////////////////////

$duracao = time() + (7 * 24 * 60 * 60);

$payload = [
    'exp' => $duracao,
    'id' => '' ,
];

$payload = json_encode($payload);
$payload = base64_encode($payload);

///////////////////////////////////////////////

$chave = "BJ89AD3DF3IHJNKLPJ";

$signature = hash_hmac('sha256', "$header.$payload", $chave, true);
}