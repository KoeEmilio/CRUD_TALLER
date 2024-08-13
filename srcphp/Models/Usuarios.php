<?php

class Usuario extends Models
{
    protected $fillable = [
        'Usuario',
        'Contraseña'
    ];

    protected $table = 'Usuarios';
}