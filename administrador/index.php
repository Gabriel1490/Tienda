<?php 
session_start();
if($_POST){
    if(($_POST["usuario"]=="Gabriel") && ($_POST["contraseña"]=="12345678")){
        $_SESSION["usuario"]="Ok";
        $_SESSION["nombreUsuario"]="Gabriel";
        header('Location:inicio.php');   //header es un metodo de php que redirecciona
    }else{
        $mensaje= "El usuario o la contraseña son incorrectos";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  </head>
  <body>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-8">
             <div class="card">
                <div class="card-header">
                    Loging
                </div>
                <div class="card-body">
                    <?php if(isset($mensaje)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo($mensaje); ?>
                    </div>
                    <?php }?>
                    <form method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usuario</label>
                            <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Escribe tu usuario">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña:</label>
                            <input type="password" class="form-control" name="contraseña" placeholder="Escribe tu contraseña">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Entrar al Administrador</button>
                    </form>
                
                </div>
                
             </div>
            </div>
            
        </div>
    </div>


  </body>
</html>