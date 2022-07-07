<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "loja";
$porta = 3306;

try {
     $conn = new PDO("mysql:host=$host;porta=$porta;dbname=" .$dbname ,$user ,
             $password, array(PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES UTF8"));
    // echo "conexao realizada com sucesso";

} catch (Exception $exc) {
    die("Erro ao tentar conectar ao banco, caso retorne, favor entrar me contato com o administrador");
 
     }
     