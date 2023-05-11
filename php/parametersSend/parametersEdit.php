<?php
        $mensaje = 
        'En este momento sus datos fueron actualizados, de ahora en adelante se presentarán con las siguientes credenciales: 
        Nombres: '.strtoupper($nombres).'  
        Apellidos: '.strtoupper($apellidos).'  
        DNI: '.strtoupper($dni).'  
        Salario: '.$salario.'  
        Telefono: '.$telefono.'';
        $tipoEnvio = 'sendMessage';
        $data1 = [
            "message" => $mensaje
        ];
?>