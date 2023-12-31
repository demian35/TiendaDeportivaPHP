<?php
session_start();//iniciamos la sesion
if($_POST){
    if(($_POST['usuario']=="admin") && ($_POST['contrasena']=="12345")){//si se ingresa el usuario admin y la contraseña 12345 ingresa al crud
        $_SESSION['user']="admin";
        $_SESSION['nombreUsuario']="Admin";
        header('Location:inicio.php');
    }else{
        $mensaje= "Usuario o contranseña son incorrectos";
    }
    
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Inicia Sesion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
         body{
            background-image: url('../img/estadio01.jpg');
            background-size: 1370px 1100px;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">

        <div class="col-md-4">

        </div>
            <div class="col-md-4">
                <br>
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="" method="post">

                        <div class = "form-group">
                        <label>Usuario</label>
                        <input  type="text" class="form-control" name="usuario" aria-describedby="emailHelp" placeholder="Ingrese su usuario">
                        <small  class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group">
                        <label >Password</label>
                        <input  type="password" class="form-control" name="contrasena" placeholder="Password">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                        </form>
                        
                        

                    </div>
                    <div class="card-footer">
                        <?php if(isset($mensaje)){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>