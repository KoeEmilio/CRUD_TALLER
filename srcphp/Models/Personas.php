<?php

namespace proyecto\Models;

class Personas extends Models{

    protected $filleable = ["PersonaID","Nombre","Direccion","Telefono","Correo"];
    protected $table = "Personas";
}