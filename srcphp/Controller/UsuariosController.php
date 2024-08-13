<?php

namespace proyecto\Controller;

use proyecto\Models\Table;
use proyecto\Models\Personas;
use proyecto\Models\Empleados;
use PDO;
use PDOException;
use proyecto\Response\Success;

class UsuariosController{

    public function register(){
        
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $newUsuario = new Usuarios();
        $newUsuario->UsuarioID = $dataObject->UsuarioID;
        $newUsuario->Usuario = $dataObject->Usuario;
        $newUsuario->Password = password_hash($dataObject->Password, PASSWORD_DEFAULT);

        $usuarioID = $newUsuario->UsuarioID;

        $newPersona = new Personas();
        $newPersona->Nombre = $dataObject->Nombre;
        $newPersona->Direccion = $dataObject->Direccion;
        $newPersona->Telefono = $dataObject->Telefono;
        $newPersona->Correo = $dataObject->Correo; // Asignar el nombre de usuario
        $newPersona->Usuario = $usuarioID; // Asignar el ID del usuario recién creado
        $newPersona->save();

        // Obtener el ID de la nueva persona creada
        $personaID = $newPersona->PersonaID;

        $newEmpleado = new Empleados();
        $newEmpleado->EmpleadoID = $dataObject->EmpleadoID; // Asignar el ID del empleado
        $newEmpleado->RFC = $dataObject->RFC;
        $newEmpleado->Num_Seguro_Social = $dataObject->Num_Seguro_Social;
        $newEmpleado->CURP = $dataObject->CURP;
        $newEmpleado->Persona_Empleado = $personaID; // Asignar el ID de la persona recién creada
        $newEmpleado->Estado = $dataObject -> Estado; 
        $newEmpleado->save();

    

        // Devolver los datos del nuevo empleado
        return (new Success($newEmpleado))->Send();
    }
}
