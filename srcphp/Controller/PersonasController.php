<?php

namespace proyecto\Controller;
use proyecto\Models\Personas;
use proyecto\Response\Success;
use proyecto\Models\Clientes;
use proyecto\Models\Table;

Class PersonasController{

    public function mostarpersonas(){
    $persona = Personas::all();

    $success = new Success($persona);
    return $success -> send();


    }

    public function mostrarclientes(){
        
        $tablapersona= new Table();
        $todaslaspersonas = $tablapersona -> query("select Personas.Nombre as personas, Personas.Direccion as direccion,
        Personas.Telefono as Telefono, Usuarios.Usuario as Usuarios
        from Personas
        inner join Usuarios on Personas.Usuario = Usuarios.UsuarioID
        inner join Rol_Usuario on Rol_Usuario.Usuario = Usuarios.UsuarioID
        inner join Roles on Rol_Usuario.Rol = Roles.RolesID
        where Roles.Rol = 'Cliente'");
        

        $success = new Success($todaslaspersonas);
        return $success -> send();

        
    }

    
}