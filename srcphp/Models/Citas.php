<?php

namespace proyecto\Models;

use proyecto\Models\Table;
use proyecto\Response\Success;

class Citas extends Models
{
    
    protected $filleable = ["CitaID", "ClienteID", "VehiculoID", "Fecha_Cita", "Hora_Cita","Estado","MecanicoID"];
    protected $table ="Citas";
}