<?php include "header.php"; ?>
<?php
    session_start();
    $operacion = "";
    if (isset($_SESSION['operacion'])) {
        $operacion = $_SESSION['operacion'];
        unset($_SESSION['operacion']);
    }
?>

    <div class="container">
        <h3>Informacion Personal de Estudiantes de Sistemas</h3>
        <form action="servidor/subirimagen.php" enctype="multipart/form-data" method="POST">
        <div class="row">
            <div class="col-sm-4">
                <label for="paterno" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" name="paterno" id="paterno" placeholder="Apelido Paterno">   
            </div>
            <div class="col-sm-4">
                <label for="materno" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" name="materno" id="materno" placeholder="Apelido Materno">   
            </div>
            <div class="col-sm-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">   
            </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
              <label for="matricula" class="form-label">Matricula</label>
              <input type="text" class="form-control" name="matricula" id="matricula" placeholder="matricula">   
          </div>
          <div class="col-sm-4">
              <label for="fecha" class="form-label">Fecha de Nacimiento</label>
              <input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de Nacimiento">   
          </div>
          <div class="col-sm-4">
              <label for="especialidad" class="form-label">Especialidad</label>
              <input type="text" class="form-control" name="especialidad" id="especialidad" placeholder="Especialidad">   
          </div>
      </div>
      <div class="row">
          <div class="col-sm-4">
              <label for="sexo" class="form-label">Sexo</label>
              <select class="form-control" id="sexo" name="sexo">
                <option>Seleciona el Sexo</option>
                <option>Femenino</option>
                <option>Masculino</option>
               </select>  
          </div>
          <div class="col-sm-4">
              <label for="imagen" class="form-label">Imagen de Perfil</label>
              <input type="file" class="form-control-file" id="imagen" name="imagen"> 
          </div>
      </div>
      <br>
        <button class="btn btn-primary">Agregar</button>
      <br>
      </form>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <h3>Tabla Estudiantes</h3>
            <?php include "tablaEstudiantes.php";  ?>
            </div>
        </div>
    </div>
<?php include "footer.php"; ?>
<script>
    let operacion = "<?php echo $operacion; ?>";

    if (operacion == "insert") {
        Swal.fire(":D", "Agregado con exito!", "success");
    } else if(operacion == "error") {
        Swal.fire(":(", "Error al agregar!", "error");
    } else if (operacion == "delete") {
        Swal.fire(":D", "Eliminado con exito!", "info");
    } else if (operacion == "error2") {
        Swal.fire(":(", "Error al eliminar!", "error");
    }

</script>
