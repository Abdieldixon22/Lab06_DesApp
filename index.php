<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Proyecto Grupo 2</title>
</head>
<body>

    <!-- NAVIGATION  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Employee App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <form class="form-inline my-2 my-lg-0" id="fSearch">
            <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Id Empleado" aria-label="Search">
            <input class="btn btn-success my-2 my-sm-0" type="submit" value="Buscar" />
          </form>
      </div>
    </nav>

    <div class="container">
      <div class="row p-4">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <!-- FORMULARIO PARA AÑADIR EMPLEADOS -->
              <form id="emp-form" action="php/register.php" method="post">
                <div class="form-group">
                    <input type="text" name="firstName" placeholder="Nombres" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="lastName" placeholder="Apellidos" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" name="dni" placeholder="DNI" class="form-control">
                </div>
                <div class="form-group">
                    <input type="number" name="salary" placeholder="Salario" class="form-control" min="0" step="0.01">
                </div>
                <input type="hidden" id="prodId">
                <input type="submit" class="btn btn-primary btn-block text-center" value="Guardar empleado"/>
              </form>
            </div>
          </div>
        </div>

        <!-- TABLA  -->
        <div class="col-md-7">
            <div class="card my-4" id="emp-result">
                <div class="card-body">
                  <!-- BUSCAR EMPLEADO -->
                  <ul id="emp-ul-result"></ul>
                </div>
            </div>
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <td>Id</td>
                <td>Nombres</td>
                <td>Apellidos</td>
                <td>DNI</td>
                <td>Salario</td>
              </tr>
              <?php
                // Consultar todos los empleados
                include_once 'php/conexion.php';
                $sentencia = $bd -> query("select * from employees");
                $empleados = $sentencia->fetchAll(PDO::FETCH_OBJ);

                foreach($empleados as $emp) {
              ?>
                <!--ENLISTAR EMPLEADOS-->
                <tr>
                  <td><?php echo $emp->id?></td>
                  <td><?php echo $emp->nombres ?></td>
                  <td><?php echo $emp->apellidos ?></td>
                  <td><?php echo $emp->dni ?></td>
                  <td><?php echo $emp->salario ?></td>
                  <td><a class="btn btn-success pt-2 pb-2 pl-3 pr-3" href="php/edit.php?codigo=<?php echo $emp->id; ?>">Editar</a></td>
                  <td><a onclick="return confirm('Estas seguro de eliminar?');" class="btn btn-danger pt-2 pb-2 pl-3 pr-3" href="php/delete.php?codigo=<?php echo $emp->id; ?>">Eliminar</a></td>
                </tr>
              <?php
                }
              ?>
            </thead>
            <tbody id="employees"></tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="script/onLoad.js"></script>
  </body>
</html>