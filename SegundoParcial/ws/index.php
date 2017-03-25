<?php
include("../clases/usuario.php");
include("../clases/ofertas.php");
include("../clases/productos.php");
include("../clases/sucursal.php");
require 'vendor/autoload.php';
 
 
$app = new Slim\App();

 

//get----------------------------

$app->get('/usuarios[/]', function ($request, $response, $args) {
    //$response->write("Lista de usuarios");
    $dato=usuario::TraerTodosLosusuarios();
    $response->write(json_encode($dato));

    return $response;
});


$app->get('/productos[/]', function ($request, $response, $args) {
 
    $dato=productos::TraerTodosLosproductos();
    $response->write(json_encode($dato));

    return $response;
});


$app->get('/empleados[/]', function ($request, $response, $args) {
 
    $dato=usuario::TraerTodosLosempleados();
    $response->write(json_encode($dato));
    return $response;
});

$app->get('/encargado[/]', function ($request, $response, $args) {
 
    $dato=usuario::TraerTodosLosencargados();
    $response->write(json_encode($dato));
    return $response;
});

$app->get('/clientes[/]', function ($request, $response, $args) {
 
    $dato=usuario::TraerTodosLosclientes();
    $response->write(json_encode($dato));
    return $response;
});

 

//post-----------------------
$app->post('/login/{objeto}', function ($request, $response, $args) {
    
   

    $pers=$args['objeto'];
    $str=json_decode($pers);
    $dato=usuario::TraerUnusuario($pers);   
   echo json_encode($dato);
});

$app->post('/AltaClientes/{objeto}', function ($request, $response, $args) {
 
    $pers=json_decode($args['objeto']);
    $UnCliente = new usuario();
    $UnCliente->id_user='4';
    $UnCliente->nombre = $pers->nombre;
    $UnCliente->apellido = $pers->apellido;
    $UnCliente->direccion=$pers->dir;
    $UnCliente->mail=$pers->mail;
    $UnCliente->telefono=$pers->tel;
    $UnCliente->tipo=$pers->tipo;
    $UnCliente->estado=$pers->estado;
    $UnCliente->sucursal="na";
    $UnCliente->password=$pers->pass;
    $dato=usuario::Insertarusuario($UnCliente);  
    $response->write(json_encode($dato));
     
    return $response;

    
});

    $app->post('/AltaP/{objeto}', function ($request, $response, $args) {
 
    $prod=json_decode($args['objeto']);
    $UnProd = new productos();
    $UnProd->descripcion = $prod->descripcion;
    $UnProd->precio = $prod->precio;
    $dato=productos::Insertarproducto($UnProd);  
    $response->write(json_encode($dato));
    //return json_encode($UnProd);
    return $response;
 
    
});



$app->post('/AltaUs/{objeto}', function ($request, $response, $args) {
 
    $pers=json_decode($args['objeto']);
    $UnCliente = new usuario();
    $UnCliente->id_user='4';
    $UnCliente->nombre = $pers->nombre;
    $UnCliente->apellido = $pers->apellido;
    $UnCliente->direccion=$pers->dir;
    $UnCliente->mail=$pers->mail;
    $UnCliente->telefono=$pers->tel;
    $UnCliente->tipo=$pers->tipo;
    $UnCliente->estado=$pers->estado;
    $UnCliente->sucursal=$pers->sucursal;
    $UnCliente->password=$pers->pass;
    //return json_encode($pers);
    $dato=usuario::Insertarusuario($UnCliente);  
    $response->write(json_encode($dato));
    return $response;

    
});

 

//put------------------------


$app->put('/ModifUs/{objeto}', function ($request, $response, $args) {
 
    $pers=json_decode($args['objeto']);
    $UnCliente = new usuario();
    $UnCliente->id_user = $pers->id_user;
    $UnCliente->nombre = $pers->nombre;
    $UnCliente->apellido = $pers->apellido;
    $UnCliente->direccion=$pers->dir;
    $UnCliente->mail=$pers->mail;
    $UnCliente->telefono=$pers->tel;
    $UnCliente->tipo=$pers->tipo;
    $UnCliente->estado=$pers->estado;
    $UnCliente->sucursal=$pers->sucursal;
    $UnCliente->password=$pers->pass;
    $dato=usuario::Modificarusuario($UnCliente);  
    $response->write(json_encode($dato));
    //return json_encode($UnCliente);
    return $response;

    
});


$app->put('/ModifP/{objeto}', function ($request, $response, $args) {
 
    $prod=json_decode($args['objeto']);
    $UnProd = new productos();
    $UnProd->id_producto = $prod->id_producto;
    $UnProd->descripcion = $prod->descripcion;
    $UnProd->precio = $prod->precio;
    $dato=productos::Modificarproducto($UnProd);  
    $response->write(json_encode($dato));
    return $response;
  
});

//---------------------------


//delete---------------------

$app->delete('/ElimUs/{objeto}', function ($request, $response, $args) {
 
    $pers=json_decode($args['objeto']);
    $UnCliente = new usuario();
    $UnCliente->id_user = $pers->id_user;
    $UnCliente->nombre = $pers->nombre;
    $UnCliente->apellido = $pers->apellido;
    $UnCliente->direccion=$pers->dir;
    $UnCliente->mail=$pers->mail;
    $UnCliente->telefono=$pers->tel;
    $UnCliente->tipo=$pers->tipo;
    $UnCliente->estado=$pers->estado;
    $UnCliente->sucursal="na";
    $UnCliente->password=$pers->pass;
    $dato=usuario::Borrarusuario($UnCliente->mail,$UnCliente->id_user,$UnCliente->tipo);  
    $response->write(json_encode($dato));
    //return json_encode($UnCliente);
    return $response;

    
});

$app->delete('/ElimP/{objeto}', function ($request, $response, $args) {
 
    $prod=json_decode($args['objeto']);
    $UnProd = new productos();
    $UnProd->id_producto = $prod->id_producto;
    $dato=productos::Borrarproducto($UnProd->id_producto);  
    $response->write(json_encode($dato));
    return $response;
    return json_encode($UnProd);
});

//---------------------------


$app->run();
