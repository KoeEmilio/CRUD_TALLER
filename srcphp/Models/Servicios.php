<?php

class Servicio extends Models
{
    protected $fillable = [
        'Nombre_Servicio',
        'Descripcion',
        'Costo_Servicio',
        'Tipo_ServicioID'
    ];

    protected $table = 'Servicios';
}