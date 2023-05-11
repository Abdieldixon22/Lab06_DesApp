<?php

    include_once 'conexion.php';

    $nombres = $_POST['firstName'];
    $apellidos = $_POST['lastName'];
    $dni = $_POST['dni'];
    $salario = $_POST['salary'];
    $telefono = $_POST['cellphone'];

    if(strlen($dni) != 8) {
        header('Location: ..\index.php?mensaje=dniInvalid');
        exit();
    }else if($salario >= 10000) {
        header('Location: ..\index.php?mensaje=salaryInvalid');
        exit();
    }

    $sentencia = $bd->prepare("INSERT INTO employees(nombres,apellidos,dni,salario,telefono) VALUES (?,?,?,?,?);");

    try {
        $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $salario, $telefono]);
    
        if ($resultado === TRUE) {
            $mensaje = "!Bienvenido(a) *" . $nombres . " " . $apellidos . "* acaba de ser ".
                       "registrado dentro de *Employee App*¡";
            include_once 'enviarMensaje.php';
            header('Location: ..\index.php?mensaje=registrado');
        } else {
            header('Location: ..\index.php?mensaje=error');
            exit();
        }
    }catch(Exception $e) {
        header('Location: ..\index.php?mensaje=dniRepeated');
        exit();
    }
?>