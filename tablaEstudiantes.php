<?php 
    include "servidor/conexion.php";
    $conexion = conexion();
    $sql = "SELECT * FROM t_estudiante";
    $respuesta =  mysqli_query($conexion, $sql);
?>
<table class="table table-bordered table-hover">
    <thead>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Matricula</th>
        <th>Especialidad</th>
        <th>Sexo</th>
        <th>Imagen de Perfil</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
    <?php 
            while($mostrar = mysqli_fetch_array($respuesta)) { 
        ?>
        <tr>
        <td><?php $id = $mostrar['id_estudiante']; 
        echo $mostrar['paterno']; ?></td>
        <td><?php echo $mostrar['materno']; ?></td>
        <td><?php echo $mostrar['nombre']; ?></td>
        <td><?php echo $mostrar['edad']; ?></td>
        <td><?php echo $mostrar['matricula']; ?></td>
        <td><?php echo $mostrar['especialidad']; ?></td>
        <td><?php echo $mostrar['sexo']; ?></td>
        <td>
            <?php 
                   $nombre = $mostrar['imagen'];
                   $ext = $mostrar['extension'];
                   $cadenaImagen = '';
                   if ($ext == 'jpg') {
                    $cadenaImagen = '<img src=' . 'img/' . $nombre . ' width="50px" height="50px">';
                    echo '<a href="visualizarFull.php?nombre=' . $nombre . '" target="_blank"> ' . $cadenaImagen . ' </a>';
                }
            ?>
        </td>
        <td>
        <form action="servidor/eliminar.php" method="POST">
                    <input type="text" hidden name="id_estudiante" id="id_estudiante" value="<?php echo $id ?>">
                    <button  class="btn btn-danger">Eliminar</button>
                    <script>
                       // alert(<?php echo $id ?>);
                    </script>
                </form>
        </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>