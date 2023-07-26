<?php
 //datos del servidor , usuario , base de datos y contraseña a la bd que nos conectaremos

 $server="localhost";
 $baseDedatos="sitiotiendadeportiva";
 $user="root";
 $password="root";

 //creando la conexion con la base
 try{
    $conexion= new PDO("mysql:host=$server;dbname=$baseDedatos",$user,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo (isset($conexion))?"conexion establecida":"";
 }catch(PDOException $error){
        echo "Fallo al conectarse con la bd".$error->getMessage();
 }

?>