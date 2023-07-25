<?php

include("../template/header.php");
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Registra producto
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

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
                    <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Producto">
                </div>

                <br>
                <div class="btn-group" role="group" aria-label="Button group name">
                    <button type="button" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-info">Cancelar</button>
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