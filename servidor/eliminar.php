<?php
 session_start();
 include "conexion.php";
 $conexion = conexion();
 $id_estu = $_POST['id_estudiante'];

  //obtenemos el nombre del archivo y formamos la ruta de donde se encuentra
    //para poder localizarlo y eliminarlo
    $sql = "SELECT imagen FROM t_estudiante WHERE id_estudiante = '$id_estu'";
    $respuesta = mysqli_query($conexion, $sql);
    $nombreImagen = mysqli_fetch_row($respuesta)[0];

    $rutaDeArchivo = "../img/" .  $nombreImagen;

  //eliminar el registro del archivo en bd
  $sql = "DELETE FROM t_estudiante WHERE id_estudiante = '$id_estu'";
  $respuesta = mysqli_query($conexion, $sql);

  if ($respuesta) {
    if (unlink($rutaDeArchivo)) {
        $_SESSION['operacion'] = "delete";
    } else {
        $_SESSION['operacion'] = "error2";
    }
} else {
    $_SESSION['operacion'] = "error2";
}

header("location:../index.php");


?>