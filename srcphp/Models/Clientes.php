<?php

namespace proyecto\Models;

class Clientes extends Models{

    protected $filleable = ["ClienteID","PersonaID","Tipo_Cliente","Fecha_Registro",];
    protected $table = "Clientes";
}