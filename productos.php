<?php include("template/header.php") ?>
<?php include("administrador/config/conexionBD.php"); 

//sentencia para mostrar los productos en la pantalla

$sentencia = $conexion->prepare("SELECT * FROM sitiotiendadeportiva.productos;");
$sentencia->execute(); //ejecutamos la sentencia
$resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC); //mostramos los registros en la pantalla


?>
<?php foreach($resultados as $producto) {?>
<div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $producto['imagen']?>" alt="Title">
        <div class="card-body">
            <h4 class="card-title"><?php echo $producto['producto']?></h4>
            
            <a name="" id="" class="btn btn-primary" href="https://www.kitfutboll.com/camisetas-de-futbol-club-america-primera-20232024-p-25627.html" role="button">Ver detalles</a>
        </div>
    </div>
</div>
<?php } ?>


<?php include("template/footer.php") ?>