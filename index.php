<?php
require_once("config.php");

//$sql = new Sql();

//$usuarios = $sql->select("select * from usuarios");

//echo json_encode($usuarios);

$usuario = new Usuario();

$usuario->loadById(1);


echo $usuario;
?>