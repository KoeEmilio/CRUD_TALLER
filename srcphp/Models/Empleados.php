<?php

namespace proyecto\Models;

class Empleados extends Models{

    protected $filleable = ["EmpleadoID","RFC","Num_Seguro_Social","CURP","Correo","Fecha_Ingreso","Persona_Empleado","Estado"];
    protected $table = "Empleados";
}