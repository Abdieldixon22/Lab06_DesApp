<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'conexion.php';

    $idEmp = $_POST['id'];
    $nombres = $_POST['firstName'];
    $apellidos = $_POST['lastName'];
    $dni = $_POST['dni'];
    $salario = $_POST['salary'];

    $sentencia = $bd->prepare("UPDATE employees SET nombres = ?, apellidos = ?, dni = ?,salario = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $salario, $idEmp]);

    if ($resultado === TRUE) {
        header('Location: ..\index.php?mensaje=editado');
    } else {
        header('Location: ..\index.php?mensaje=error');
        exit();
    }
