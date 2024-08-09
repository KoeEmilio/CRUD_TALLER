<?php

namespace proyecto\Models;

class Empleados extends Models{

    protected $filleable = ["EmpleadoID","RFC","Num_Seguro_Social","CURP","Persona_Empleado","Estado"];
    protected $table = "Empleados";
}