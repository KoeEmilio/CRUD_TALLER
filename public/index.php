<?php

namespace proyecto;
require("../vendor/autoload.php");

use proyecto\Controller\crearPersonaController;
use proyecto\Models\User;
use proyecto\Models\Personas;
use proyecto\Response\Failure;
use proyecto\Response\Success;
use proyecto\Controller\PersonasController;
use proyecto\Controller\EmpleadosController;
Router::headers();



Router::get('/prueba',[PersonasController::class,'mostarpersonas']);
Router::get('/clientes',[PersonasController::class,'mostrarclientes']);
Router::get('/crearpersona', [crearPersonaController::class, "crearPersona"]);
Router::post('/ingresacliente', [EmpleadosController::class, "registroempleado"]);
Router::get('/usuario/buscar/$id', function ($id) {

    $user= User::find($id);
    if(!$user)
    {
        $r= new Failure(404,"no se encontro el usuario");
        return $r->Send();
    }
$r= new Success($user);
    return $r->Send();


});
Router::get('/respuesta', [crearPersonaController::class, "response"]);
Router::any('/404', '../views/404.php');
