<?php

include("../template/header.php");
?>

<?php
//Recepcion y validacion con ifs ternarios de los datos que se reciban del form

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : ""; //recibimos el ID del form si se recibe un id entonces txtID=$_POST['txtID'] caso contrario nada
$nombreProd = (isset($_POST['nombreProd'])) ? $_POST['nombreProd'] : ""; //recibimos nombre si hay un nombre nombreProd=$_POST['nombreProd']
$imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : ""; //lo mismo con una imagen
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : ""; //validamos la accion que se esta realizando agregar, editar o cancelar



include("../config/conexionBD.php"); //importamos la clase conexionBD.php

//validacion de la accion que se presenta
switch ($accion) {
    case "Agregar": //si se presiona agregar
        //sentencia para insercion
        $sentencia = $conexion->prepare("INSERT INTO productos(idproductos,producto,imagen) VALUES(NULL,:nombre,:imagen);");
        $sentencia->bindParam(':nombre', $nombreProd); //parametros a insertar en la base de datos
        $sentencia->bindParam(':imagen', $imagen);
        $sentencia->execute();
        break;
    case "Editar": //si se presiona editar
        echo "Se presiono el boton editar";
        break;
    case "Cancelar": //si se presiona cancelar
        echo "Se presiono cancelar";
        break;
    case "Seleccionar": //seleccionamos el registro al que le apachurremos el boton selecionar
        $sentencia = $conexion->prepare("SELECT * FROM sitiotiendadeportiva.productos WHERE idproductos=:id;");
        $sentencia->bindParam(':id', $txtID); //parametros a seleccionar en la base de datos
        $sentencia->execute(); //ejecutamos la sentencia
        $producto = $sentencia->fetch(PDO::FETCH_LAZY); //mostramos el registro seleccionado
        //mostramos los datos del producto seleccionado
        $nombreProd=$producto['producto'];
        $imagen=$producto['imagen'];
        break;
    case "Borrar": //si se presiona cancelar
        $sentencia = $conexion->prepare("DELETE FROM sitiotiendadeportiva.productos WHERE idproductos=:id");
        $sentencia->bindParam(':id', $txtID); //parametros a eliminar en la base de datos
        $sentencia->execute();
        break;
}

//sentencia para mostrar los registros en la pantalla

$sentencia = $conexion->prepare("SELECT * FROM sitiotiendadeportiva.productos;");
$sentencia->execute(); //ejecutamos la sentencia
$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC); //mostramos los registros en la pantalla


?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Registra producto
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" class="form-control" name="txtID" value="<?php echo $txtID?>" id="txtID" placeholder="ID">
                </div>

                <br>

                <div class="form-group">
                    <label for="nombreProd">Nombre del producto:</label>
                    <input type="text" class="form-control" name="nombreProd" value="<?php echo $nombreProd ?>" id="nombreProd" placeholder="Producto">
                </div>

                <br>
                <div class="form-group">
                    <label for="imagen">Imagen producto:</label>
                    <?php echo $imagen ?>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                </div>

                <br>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Editar" class="btn btn-warning">Editar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>

        </div>
        <div class="card-footer">
            <?php include("../config/conexionBD.php");
            echo (isset($conexion)) ? "conexion establecida" : "";
            ?>
        </div>


    </div>
</div>




<div class="col-md-7">
    <div class="table-responsive">
        <table class="table table-bordered table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Imagen del producto</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultados as $producto) { ?>
                    <tr class="">
                        <td scope="row"> <?php echo $producto['idproductos'] ?></td>
                        <td><?php echo $producto['producto'] ?></td>
                        <td><?php echo $producto['imagen'] ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['idproductos'] ?>">
                                <input class="btn btn-info" type="submit" name="accion" value="Seleccionar">
                                <input class="btn btn-danger" type="submit" name="accion" value="Borrar">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</div>




<?php include("../template/footer.php") ?>