<?php
    $mensaje = "!Bienvenido(a) *".$nombres." ".$apellidos."* acaba de ser registrado dentro " . 
        "de *Employee App*¡";
    $urlFile = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1_4u3aYPPFqvOyirJ0FmKqbc4taY_-6Bc997tZhPmTNKZEhmGhdoDqDMLHp2pIJi6tpQ";
    $fileName = "welcome.png";
    $tipoEnvio = 'sendFileByUrl';
    $data1 = [
        "caption" => $mensaje,
        "urlFile" => $urlFile,
        "fileName" => $fileName
    ];
?>