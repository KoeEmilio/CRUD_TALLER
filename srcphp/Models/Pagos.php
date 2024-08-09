<?php

class Pago extends Models
{
    protected $fillable = [
        'OrdenID', 'Fecha_de_pago','Forma_Pago',
        'Estado',
        'Cantidad_Abonada','Total'
    ];
    
    protected $table ='Pagos';
}