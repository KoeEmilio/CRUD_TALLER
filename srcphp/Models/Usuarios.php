<?php

class Usuario extends Models
{
    protected $fillable = [
        'PersonaID',
        'Usuario',
        'Contraseña'
    ];

    protected $table = 'Usuarios';
}