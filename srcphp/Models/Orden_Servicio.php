<?php

namespace proyecto\Models;

class Orden_Servicio extends Models
{
    protected $fillable = [
        'Fecha_Ingreso',
        'Hora_ingreso',
        'Empleado_Que_Atendera',
        'Vehiculo',
        'Motivo',
        'Cita',
        'Estado'
    ];

    protected $table = 'Orden_Servicio';
}