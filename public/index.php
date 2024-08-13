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
use proyecto\Controller\VehiculosController;
use PDO;


Router::post('/empleado',[EmpleadosController::class,'register']);

Router::post('/registrovehiculos',[VehiculosController::class,'register']);

Router::post('/citas',[PersonasController::class,'registercita']);

Router::post('/ingresaempleado', [EmpleadosController::class, "registroempleado"]);

Router::put('/actualizarclientes',[PersonasController::class,'ActualizarClientes']);

Router::get('/personaid',[PersonasController::class,'buscarpersona']);

Router::get('/clientes',[PersonasController::class,'mostrarclientes']);

Router::get('/empleados',[EmpleadosController::class,'mostrarempleados']);

Router::get('/pagos',[PersonasController::class,'mostrarpagos']);

Router::get('/vehiculos',[VehiculosController::class,'mostrarvehiculos']);

Router::get('/crearpersona', [crearPersonaController::class, "crearPersona"]);

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
