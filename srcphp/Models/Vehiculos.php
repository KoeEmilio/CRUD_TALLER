<?php

namespace proyecto\Models;

class Vehiculos extends Models{

    protected $filleable = ["VehiculoID", "Marca", "Modelo", "Anio", "Color", "Matricula", "Propietario","Tipo_de_Transmision"];
    protected $table = "Vehiculos";
}