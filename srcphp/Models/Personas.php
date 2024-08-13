<?php

namespace proyecto\Models;

class Personas extends Models{

    protected $filleable = ["Nombre","Direccion","Telefono","Correo"];
    protected $table = "Personas";
}