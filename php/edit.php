<?php include_once 'conexion.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <title>Proyecto Grupo</title>
</head>
<body>

    <!-- NAVIGATION  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="..\index.php">Employee App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <p class="text-light">Edición empleado</p>
      </div>
    </nav>

    <div class="container">
      <div class="row p-4 justify-content-center">
        <div class="col-md-5">
          <div class="card">
            <div class="card-body">
              <!-- FORMULARIO PARA EDITAR EMPLEADO -->
              <form id="emp-form" action="editProceso.php" method="post">

                <?php 

                    $idEmp = $_GET['codigo'];

                    $sent = $bd->query('SELECT * FROM employees WHERE id='.$idEmp);
                    $emp = $sent->fetchAll(PDO::FETCH_OBJ);

                    $id = $emp[0]->id;
                    $nombres = $emp[0]->nombres;
                    $apellidos = $emp[0]->apellidos;
                    $dni = $emp[0]->dni;
                    $salario = $emp[0]->salario;
                    $telefono = $emp[0]->telefono;
                    
                ?>
                <div class="input-group mb-3">
                    <span class="input-group-text col-md-4">Id</span>
                    <input type="number" name="id" placeholder="Id" class="form-control" readonly
                    value="<?php echo $id ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-md-4">Nombres</span>
                    <input type="text" name="firstName" placeholder="Nombres" class="form-control"
                    value="<?php echo $nombres ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-md-4">Apellidos</span>
                    <input type="text" name="lastName" placeholder="Apellidos" class="form-control"
                    value="<?php echo $apellidos ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-md-4">DNI</span>
                    <input type="number" name="dni" placeholder="DNI" class="form-control"
                    value="<?php echo $dni ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-md-4">Salario</span>
                    <input type="number" name="salary" placeholder="Salario" class="form-control" min="0" step="0.01"
                    value="<?php echo $salario ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text col-md-4">Telefono</span>
                    <input type="number" name="cellphone" placeholder="Telefono" class="form-control" min="900000000"
                    value="<?php echo $telefono ?>">
                </div>
                <input type="hidden" id="prodId">
                <input type="submit" class="btn btn-primary btn-block text-center" value="Editar empleado"/>
                <a class="btn btn-danger btn-block text-center" href="..\index.php">Cancelar</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>