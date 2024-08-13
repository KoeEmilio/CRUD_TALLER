<?php

namespace proyecto\Models;

class Vehiculos extends Models{

    protected $filleable = [ "Marca", "Modelo", "Anio", "Color", "Matricula", "Propietario","Tipo_de_Transmision",
"Tipo_de_vehiculo_Empresarial","Numero_de_Unidad"];
    protected $table = "Vehiculos";
}