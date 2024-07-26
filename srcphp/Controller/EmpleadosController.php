<?php

namespace proyecto\Controller;

use proyecto\Models\Personas;
use proyecto\Models\Empleados;
use PDO;
use PDOException;

class EmpleadosController
{
    public function registroempleado()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $RFC = $_POST['RFC'];
            $Numero_Seguro_Social = $_POST['Numero_Seguro_Social'];
            $CURP = $_POST['CURP'];
            $correo = $_POST['correo'];
            $Fecha_Ingreso = $_POST['Fecha_Ingreso'];
            $Nombre_Persona = $_POST['Persona_Empleado'];
            $Estado = $_POST['Estado'];

            try {
                // Buscar el ID de la persona por nombre
                $sql = "SELECT id FROM Personas WHERE Nombre = :Nombre";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':Nombre', $Nombre_Persona);
                $stmt->execute();
                $persona = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$persona) {
                    echo "Error: Persona no encontrada.";
                    return;
                }

                $Persona_Empleado_ID = $persona['id'];

                // Insertar el nuevo empleado
                $sql = "INSERT INTO Empleados (RFC, Numero_Seguro_Social, CURP, correo, Fecha_Ingreso, Persona_Empleado, Estado) VALUES (:RFC, :Numero_Seguro_Social, :CURP, :correo, :Fecha_Ingreso, :Persona_Empleado, :Estado)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':RFC', $RFC);
                $stmt->bindParam(':Numero_Seguro_Social', $Numero_Seguro_Social);
                $stmt->bindParam(':CURP', $CURP);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':Fecha_Ingreso', $Fecha_Ingreso);
                $stmt->bindParam(':Persona_Empleado', $Persona_Empleado_ID); // Usar el ID de la persona
                $stmt->bindParam(':Estado', $Estado);
                $stmt->execute();
                echo "Empleado insertado correctamente.";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
