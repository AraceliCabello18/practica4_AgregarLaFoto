<?php
    session_start();
    include "funciones.php";
    
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $nombre = $_POST['nombre'];
    $matricula = $_POST['matricula'];
    $fecha = $_POST['fecha'];
    $especialidad = $_POST['especialidad'];
    $sexo = $_POST['sexo'];
    $imagen = $_FILES['imagen']['name'];
    $extension = explode(".", $imagen);
    $extension = $extension[1];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDeServidor = "../img/";

     //funcion para calcular la edad
     $edad = calculaedad($fecha);

    //subir un archivo
    //move_uploaded_file nos retorna un 1 si se subio y un 0 si no se subio

    if (move_uploaded_file($rutaTemporal, $rutaDeServidor . $imagen)) {
        $insertarEnBD = agregarDatos($paterno, $materno, $nombre, $edad, $fecha, $matricula,  $especialidad, $sexo, $imagen, $extension);
        if ($insertarEnBD) {
            $_SESSION['operacion'] = "insert";
        } else {
            $_SESSION['operacion'] = "error";
        }
    } else {
        $_SESSION['operacion'] = "error";
    }

    header("location:../index.php");
    
   
?>