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
        $todoslosvehiculos = $tablavehiculos -> query("SELECT Vehiculos.Marca, Vehiculos.Modelo, Vehiculos.Anio, Vehiculos.Color, Vehiculos.Matricula,Vehiculos.Tipo_de_Transmision,
        Personas.Nombre AS Propietario
        FROM Vehiculos 
        JOIN Clientes  ON Vehiculos.Propietario = Clientes.ClienteID
        JOIN Personas  ON Clientes.PersonaID = Personas.PersonaID;");
        
        $success = new Success($todoslosvehiculos);
        return $success -> send();

    }
    public function register() {
        try {
            $JSONData = file_get_contents("php://input");
            $dataObject = json_decode($JSONData);
    
            $newVehiculo = new Vehiculos();
            $newVehiculo->Marca = $dataObject->Marca;
            $newVehiculo->Modelo = $dataObject->Modelo;
            $newVehiculo->Anio = $dataObject->Anio;
            $newVehiculo->Color = $dataObject->Color;
            $newVehiculo->Matricula = $dataObject->Matricula;
            $newVehiculo->Propietario = $dataObject->Propietario; // ID del propietario
            $newVehiculo->Tipo_de_Transmision = $dataObject->Tipo_de_Transmision;
            $newVehiculo->Tipo_de_vehiculo_Empresarial = $dataObject->Tipo_de_vehiculo_Empresarial;
            $newVehiculo->Numero_de_Unidad = $dataObject->Numero_de_Unidad;
            $newVehiculo->save();
    
            // Devolver los datos del nuevo vehículo
            return (new Success($newVehiculo))->Send();
    
        } catch (Exception $e) {
            // Manejar cualquier error que ocurra durante el proceso
            return (new Error($e->getMessage()))->Send();
        }
    }
}