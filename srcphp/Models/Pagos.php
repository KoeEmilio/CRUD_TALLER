<?php

namespace proyecto\Models;

class Pagos extends Models
{
    protected $fillable = ['OrdenID', 'Fecha_de_pago','Forma_Pago','Estado','Cantidad_Abonada','Cantidad_Restante','Total'];
    protected $table ='Pagos';
}