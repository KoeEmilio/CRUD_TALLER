<?php

namespace proyecto\Models;

class Detalle_Refaccion extends Models
{
    protected $fillable = [
        'OrdenID',
        'Nombre_Refaccion',
        'Marca',
        'Cantidad',
        'Precio',
        'Comprador'
    ];

    protected $table = 'Detalle_Refaccion';
}