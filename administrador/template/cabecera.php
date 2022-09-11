<?php 
session_start();
if(!isset($_SESSION["usuario"])){
  header("location:../index.php");
}else{
  if($_SESSION["usuario"]=="Ok"){
    $nombreUsuario=$_SESSION["nombreUsuario"];
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <?php $url="http://".$_SERVER['HTTP_HOST']."/tiendaropa" ?>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador de la Tienda <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/productos.php">Productos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>">Ver Sitio Web</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/administrador/seccion/cerrar.php"">Cerrar Seción</a>
        </div>
    </nav>

    <div class="container">
        <br/>    
      <div class="row">