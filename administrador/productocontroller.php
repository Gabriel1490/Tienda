
<?php include("../config/bd.php"); ?>
<?php

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
$txtPrecio = (isset($_POST["txtPrecio"])) ? $_POST["txtPrecio"] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
// $cancelar=(isset($_POST['cancelar']))?$_POST['cancelar']:"";
$editar = (isset($_POST['editar'])) ? $_POST['editar'] : "";

//Mostrar Todo
$sentencia = "SELECT * FROM productos";
$ejecutar = mysqli_query($conexion, $sentencia);
$listarproductos = $ejecutar->fetch_assoc();

//Insertar
if (isset($_POST['accion'])) {
    if ($_POST['txtNombre'] >= 1 && $_FILES['txtImagen'] >= 1 && $_POST['txtDescripcion'] >= 1) {

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";

        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
        if ($tmpImagen != "") {
            move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);

            $sentenciaSQL = "INSERT INTO `productos` (`id`, `nombre`, `imagen`, `descripcion`, `precio`) VALUES (NULL, '$txtNombre', '$nombreArchivo', '$txtDescripcion', '$txtPrecio')";
            $correr = mysqli_query($conexion, $sentenciaSQL); //$correr ejecuta la $sentenciaSQL
        }
    }
    $txtId = "";
    $txtNombre = "";
    $txtImagen = "";
    $txtDescripcion = "";
    header("location: $url./administrador/seccion/productos.php");
}

//editar
if ($editar) {

    $sentenciaSQL = "SELECT * FROM `productos` WHERE id='$txtID'";
    $corrersentencia = mysqli_query($conexion, $sentenciaSQL);
    $productos = mysqli_fetch_array($corrersentencia);
    $txtImagen = $productos["imagen"];
    $txtNombre = $productos["nombre"];
    $txtDescripcion = $productos["descripcion"];
    $txtPrecio = $productos["precio"];
}

//Modificar
if (isset($_POST['modificar'])) {
    if ($txtImagen != "") {
        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        move_uploaded_file($tmpImagen, "../../img/" . $nombreArchivo);
        $sentenciaSQL = "SELECT imagen FROM `productos` WHERE id='$txtID'";
        $corrersentencia = mysqli_query($conexion, $sentenciaSQL);
        $productos = mysqli_fetch_array($corrersentencia);
        //    $txtNombre=$productos["nombre"]; 
        $txtImagen = $productos["imagen"];
        //    $txtDescripcion=$productos["descripcion"];
        if (isset($productos["imagen"]) && $productos["imagen"] != "imagen.jpg") {
            if (file_exists("../../img/" . $productos["imagen"])) {
                unlink("../../img/" . $productos["imagen"]);
            }
        }
    }
    $sentenciaSQL = "UPDATE `productos` SET `nombre` = '$txtNombre', `imagen` = '$nombreArchivo', `descripcion` = '$txtDescripcion', `precio`=$txtPrecio WHERE `productos`.`id` = '$txtID'";
    $ejecuta = mysqli_query($conexion, $sentenciaSQL);
    header("location: $url./administrador/seccion/productos.php");
}

//Eliminar
if (isset($_POST['eliminar'])) {

    $sentenciaSQL = "SELECT imagen FROM `productos` WHERE id='$txtID'";
    $corrersentencia = mysqli_query($conexion, $sentenciaSQL);
    $productos = mysqli_fetch_array($corrersentencia);

    $txtImagen = $productos["imagen"];
    $txtDescripcion = $productos["descripcion"];
    
    if (isset($productos["imagen"]) && $productos["imagen"] != "imagen.jpg") {
        if (file_exists("../../img/" . $productos["imagen"])) {
            unlink("../../img/" . $productos["imagen"]);
        }
    }

    $sentenciaSQL = ("DELETE FROM productos WHERE id = '$txtID'");
    $ejecuta = mysqli_query($conexion, $sentenciaSQL);
    header("location: $url./administrador/seccion/productos.php");
}

if (isset($_POST["cancelar"])) {
    $sentenciaSQL = "SELECT * FROM `productos` WHERE id='$txtID'";
    $corrersentencia = mysqli_query($conexion, $sentenciaSQL);
    $productos = mysqli_fetch_array($corrersentencia);
    $txtID = "";
    $txtNombre = "";
    $txtImagen = "";
    $txtDescripcion = "";
    $txtPrecio = "";
}
?>