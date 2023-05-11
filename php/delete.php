<?php
    include_once 'conexion.php';

    $idEmployee = $_GET['codigo'];

    $employee = $bd->query('SELECT * FROM employees WHERE id=' . $idEmployee);
    $employee = $employee->fetchAll(PDO::FETCH_OBJ);

    // Almacenamos atributos de empleado
    $nombres = $employee[0]->nombres;
    $apellidos = $employee[0]->apellidos;
    $telefono = $employee[0]->telefono;

    $sentencia2 = $bd->prepare('DELETE FROM employees WHERE id=?');
    $resultado2 = $sentencia2->execute([$idEmployee]);
    
    // Reactualización de id
    $bd->query('ALTER TABLE employees AUTO_INCREMENT='.$idEmployee);

    if ($resultado2 === TRUE){
        include_once 'parametersSend/parametersDelete.php';
        include_once 'enviarMensaje.php';
        header('Location: ..\index.php?mensaje=eliminado');
    } else {
        header('Location: ..\index.php?mensaje=error');
        exit();
    }
?>