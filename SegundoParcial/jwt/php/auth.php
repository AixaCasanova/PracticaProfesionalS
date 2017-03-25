<?php
include_once '../vendor/autoload.php';
use \Firebase\JWT\JWT;

$datosDelModeloPorPost= file_get_contents("PHP://input");
$user=json_decode($datosDelModeloPorPost);


	
	$claveDeEncripcion="estaEsLaClave";
	$token["usuario"]=$user->correo;
	$token["nombre"]=$user->nombre;
	$token["perfil"]=$user->tipo;
	$token["iat"]=time();
	$token["exp"]=time()+999;
	$token["algo"]=$user;
 


	$jwt = JWT::encode($token, $claveDeEncripcion);
	$array["segundoparcial"]=$jwt;

	echo json_encode($array);
 
?>