<?php
    // Comprobamos que los campos estén llenados
    if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["dni"]) || empty($_POST["salary"])) {
        header('Location: .\index.html?mensaje=falta');
        exit();
    }

    include_once 'conexion.php';

    $nombres = $_POST['firstName'];
    $apellidos = $_POST['lastName'];
    $dni = $_POST['dni'];
    $salario = $_POST['salary'];

    $sentencia = $bd->prepare("INSERT INTO employees(nombres,apellidos,dni,salario) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $salario]);

    if ($resultado === TRUE) {
        header('Location: ..\index.html?mensaje=registrado');
    } else {
        header('Location: ..\index.html?mensaje=error');
        exit();
    }
?>