<?php

namespace proyecto\Models;

class Detalle_Servicio extends Models
{
    protected $fillable = [
        'OrdenID',
        'Fecha_Entrega',
        'Hora_Entrega',
        'Servicio_Dado',
        'Costo_Mano_Obra',
        'Fin_Garantia'
    ];

    protected $table = 'Detalle_Servicio';
}