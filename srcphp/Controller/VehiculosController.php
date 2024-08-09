<?php

namespace proyecto\Controller;
use PDO;
use proyecto\Models\Vehiculos;
use proyecto\Response\Success;
use proyecto\Models\Table;

class VehiculosController
{

    public function mostrarvehiculos(){

        $tablavehiculos= new Table();
        $todoslosvehiculos = $tablavehiculos -> query("SELECT vehiculos.Marca,vehiculos.Modelo,vehiculos.Anio,vehiculos.Color,vehiculos.Matricula,vehiculos.Tipo_de_Transmision,
        personas.Nombre AS Propietario
        FROM Vehiculos 
        JOIN Clientes  ON vehiculos.Propietario = clientes.ClienteID
        JOIN Personas  ON clientes.PersonaID = personas.PersonaID;");
        
        $success = new Success($todoslosvehiculos);
        return $success -> send();

    }
    public function register()
    {
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $newVehiculo = new Vehiculos();
        $newVehiculo->VehiculoID = $dataObject->VehiculoID;
        $newVehiculo->Marca = $dataObject->Marca;
        $newVehiculo->Modelo = $dataObject->Modelo;
        $newVehiculo->Anio = $dataObject->Anio;
        $newVehiculo->Color = $dataObject->Color;
        $newVehiculo->Matricula = $dataObject->Matricula;
        $newVehiculo->Propietario = $dataObject->Propietario; // ID del propietario
        $newVehiculo->Tipo_de_Transmision = $dataObject->Tipo_de_Transmision;
        $newVehiculo->save();

        // Devolver los datos del nuevo vehículo
        return (new Success($newVehiculo))->Send();
    }
}