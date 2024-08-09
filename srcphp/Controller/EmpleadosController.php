<?php

namespace proyecto\Controller;

use proyecto\Models\Table;
use proyecto\Models\Personas;
use proyecto\Models\Empleados;
use PDO;
use PDOException;
use proyecto\Response\Success;

class EmpleadosController
{

    public function mostrarempleados(){
        
        $tablaempleados= new Table();
        $todoslosempleados = $tablaempleados -> query("SELECT personas.Nombre,personas.Telefono,personas.Correo,personas.Direccion,empleados.Estado,
        COUNT(orden_servicio.OrdenID) AS Ordenes_Pendientes
        FROM Empleados 
        INNER JOIN Personas  ON empleados.Persona_Empleado = personas.PersonaID
        LEFT JOIN Orden_Servicio  ON empleados.EmpleadoID = orden_servicio.Empleado_Que_Atendera 
        where orden_servicio.Estado = 'Pendiente'
        GROUP BY empleados.EmpleadoID, personas.Nombre, personas.Telefono, personas.Correo, personas.Direccion, empleados.Estado;");
        
        $success = new Success($todoslosempleados);
        return $success -> send();
    }

    public function register(){

        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $newPersona = new Personas();
        $newPersona->PersonaID = $dataObject->PersonaID;
        $newPersona->Nombre = $dataObject->Nombre;
        $newPersona->Direccion = $dataObject->Direccion;
        $newPersona->Telefono = $dataObject->Telefono;
        $newPersona->Correo = $dataObject->Correo; // Asignar el nombre de usuario
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
