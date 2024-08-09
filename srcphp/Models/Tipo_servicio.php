<?php

class Tipo_Servicio extends Models
{
    protected $fillable = [
        'Nombre_TS',
        'Garantia'
    ];

    protected $table = 'TIPO_SERVICIO';
}