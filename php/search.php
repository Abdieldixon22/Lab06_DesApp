<?php
    $sentencia = $bd -> query("select * from employees");
    $empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);
    
?>