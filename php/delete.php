<?php
    include_once 'conexion.php';

    $idEmployee = $_GET['codigo'];

    $sentencia = $bd->prepare('DELETE FROM employees WHERE id=?');
    $resultado = $sentencia->execute([$idEmployee]);

    if ($resultado === TRUE){
        header('Location: ..\index.php?mensaje=eliminado');
    } else {
        header('Location: ..\index.php?mensaje=error');
    }
?>