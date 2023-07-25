<?php

include("../template/header.php");
?>

<?php 
//Recepcion y validacion con ifs ternarios de los datos que se reciban del form

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";//recibimos el ID del form si se recibe un id entonces txtID=$_POST['txtID'] caso contrario nada
$nombreProd=(isset($_POST['nombreProd']))?$_POST['nombreProd']:"";//recibimos nombre si hay un nombre nombreProd=$_POST['nombreProd']
$imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";//lo mismo con una imagen
$accion=(isset($_POST['accion']))?$_POST['accion']:"";//validamos la accion que se esta realizando agregar, editar o cancelar

//verificamos que si se esten recibiendo los datos:

 echo $txtID."<br>";
 echo $nombreProd."<br>";
 echo $imagen."<br>";
 echo $accion."<br>";

 //validacion de la accion que se presenta
 switch($accion){
    case "Agregar"://si se presiona agregar
        echo "Se presiono el boton de agregar";
        break;
    case "Editar"://si se presiona editar
        echo "Se presiono el boton editar";
        break;
    case "Cancelar"://si se presiona cancelar
        echo "Se presiono cancelar";
        break;
 }

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
                    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID"> 
                </div>

                <br>

                <div class="form-group">
                    <label for="nombreProd">Nombre del producto:</label>
                    <input type="text" class="form-control" name="nombreProd" id="nombreProd" placeholder="Producto">
                </div>

                <br>
                <div class="form-group">
                    <label for="imagen">Imagen producto:</label>
                    <input type="file" class="form-control" name="imagen" id="imagen" >
                </div>

                <br>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value="Editar" class="btn btn-warning">Editar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>

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
                <tr class="">
                    <td scope="row">1</td>
                    <td>Playera Pumas UNAM</td>
                    <td>imagen.jpg</td>
                    <td>Seleccionar | Borrar</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>




<?php include("../template/footer.php") ?>