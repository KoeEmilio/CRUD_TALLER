<?php

namespace proyecto\Controller;
use PDO;
use proyecto\Models\Personas;
use proyecto\Response\Success;
use proyecto\Models\Clientes;
use proyecto\Models\Citas;
use proyecto\Models\Table;
use proyecto\Models\Pagos;

Class PersonasController{

    public function mostarpersonas(){
    $persona = Personas::all();

    $success = new Success($persona);
    return $success -> send();


    }

    public function mostrarclientes(){
        
        $tablapersona= new Table();
        $todaslaspersonas = $tablapersona -> query("select Personas.PersonaID , Personas.Nombre , Personas.Correo , Personas.Telefono,
        Clientes.Tipo_Cliente
        from Personas
        inner join Clientes on Personas.PersonaID = Clientes.PersonaID");
        
        $success = new Success($todaslaspersonas);
        return $success -> send();

    
    }

    public function ActualizarClientes() {
        
        $JSONData = file_get_contents("php://input");
        $data = json_decode($JSONData, true);
    
        if (!$data) {
            return json_encode(["error" => "No se recibieron datos."]);
        }
        $personaID = $data['PersonaID'];
        $stmt = $this->PDO()->prepare("UPDATE Personas SET Nombre = :Nombre, Correo = :Correo, Telefono = :Telefono WHERE PersonaID = :PersonaID");
    
        $stmt->bindParam(':Nombre', $data['Nombre']);
        $stmt->bindParam(':Correo', $data['Correo']);
        $stmt->bindParam(':Telefono', $data['Telefono']);
        $stmt->bindParam(':PersonaID', $personaID);
    
        
        $stmt->execute();

        if (isset($data['Tipo_Cliente'])) {
            $stmtClientes = $this->PDO()->prepare("UPDATE Clientes SET Tipo_Cliente = :Tipo_Cliente WHERE PersonaID = :PersonaID");
            $stmtClientes->bindParam(':Tipo_Cliente', $data['Tipo_Cliente']);
            $stmtClientes->bindParam(':PersonaID', $personaID);

            $stmtClientes->execute();
        }
        
        if ($stmt->rowCount() > 0) {
            return json_encode(["message" => "Cliente actualizado correctamente."]);
        } else {
            return json_encode(["message" => "No se pudo actualizar el cliente o no hubo cambios."]);
        }
    }
    
    private function PDO() {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=taller_mecanico_delarosa', 'Emilio', 'jesusemilio12..');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            return json_encode(['error' => 'Error de conexión: ' . $e->getMessage()]);
        }
    }

    public function registercita()
    {
        $JSONData = file_get_contents("php://input");
        $dataObject = json_decode($JSONData);

        $newCita = new Citas();
        $newCita->CitaID = $dataObject->CitaID;
        $newCita->ClienteID = $dataObject->ClienteID;
        $newCita->VehiculoID = $dataObject->VehiculoID;
        $newCita->Fecha_Cita = $dataObject->Fecha_Cita;
        $newCita->Hora_Cita = $dataObject->Hora_Cita;
        $newCita->Estado = $dataObject->Estado;
        $newCita->MecanicoID = $dataObject->MecanicoID;
        $newCita->save();

        // Devolver los datos de la nueva cita
        return (new Success($newCita))->Send();
}

    public function mostrarpagos(){
    $pagos = Pagos::all();

    $success = new Success($pagos);
    return $success -> send();

    }
}