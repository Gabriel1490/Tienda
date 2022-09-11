<?php include("template/cabecera.php");?>
<?php include("administrador/config/bd.php");?>
 
<?php 
$sentencia= "SELECT * FROM productos";
$ejecutar= mysqli_query($conexion,$sentencia);
$listarproductos=$ejecutar->fetch_assoc();
?>

<div class="d-flex flex-row m-5 ">

<?php foreach($ejecutar as $producto){ ; ?>
      
      <div class="card m-3 d-inline-flex"  style="width:270px; height:400px">
         <div class="img">
             <img src="./img/<?php echo $producto["imagen"]?>" width="50" height="200" class="card-img-top"  alt="...">
         </div>
             <div class="card-body">
                 <h5 class="card-title"><?php echo $producto["nombre"] ?></h5>
                 <p class="card-text"><?php echo $producto["descripcion"] ?></p> 
                 <p class="card-text"><?php echo "$ ". $producto["precio"] ?></p>                                                               
             </div>
     </div>
 <?php }?>

</div>

<?php include("template/pie.php");?>
<style>
   
    .img{
        display: flex;
        align-items: center;
        width: 192px;
        margin: auto;
        margin-top: 20px;
    }
    .contenedor {
        display: flex;
        width: 100%;
    }
   
</style>