<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: ..\index.php?mensaje=error');
    }

    include 'conexion.php';

    $idEmp = $_POST['id'];
    $nombres = $_POST['firstName'];
    $apellidos = $_POST['lastName'];
    $dni = $_POST['dni'];
    $salario = $_POST['salary'];
    $telefono = $_POST['cellphone'];

    $sentencia = $bd->prepare("UPDATE employees SET nombres = ?, apellidos = ?, dni = ?,salario = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $apellidos, $dni, $salario, $idEmp]);

    if ($resultado === TRUE) {
        $mensaje = "Estimado(a) *" . $nombres . " " . $apellidos . "* le informamos que ".
                   "algunos de sus datos fueron actualizados dentro de su usuario de ".
                   "*Employee App*";
        include_once 'enviarMensaje.php';
        header('Location: ..\index.php?mensaje=editado');
    } else {
        header('Location: ..\index.php?mensaje=error');
        exit();
    }
