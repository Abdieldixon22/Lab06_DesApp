<?php

    include_once 'conexion.php';

    $nombres = $_POST['firstName'];
    $apellidos = $_POST['lastName'];
    $dni = $_POST['dni'];
    $salario = $_POST['salary'];

    if(strlen($dni) != 8) {
        header('Location: ..\index.php?mensaje=dniInvalid');
        exit();
    }else if($salario >= 10000) {
        header('Location: ..\index.php?mensaje=salaryInvalid');
        exit();
    }

    $sentencia = $bd->prepare("INSERT INTO employees(nombres,apellidos,dni,salario) VALUES (?,?,?,?);");

    try {
        $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $salario]);
    
        if ($resultado === TRUE) {
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