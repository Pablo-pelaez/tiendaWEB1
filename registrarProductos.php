<?php

include('BaseDatos.php');

//Registrar los productos
if(isset($_POST["botonEnviar"]))
{

    $nombreProducto = $_POST["nombreProducto"];
    $marca = $_POST["marca"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];
    $imagen = $_POST["imagen"];

    //copia u objeto de la BD
    $transaccion = new BaseDatos();

    //crear consulta
    $consultaSQL="INSERT INTO productos(nombreProducto, marca, precio, descripcion, imagen) VALUES ('$nombreProducto', '$marca', '$precio', '$descripcion', '$imagen')";

    //llamo al metodo de la clase agregar BD agregarDatos
    $transaccion->agregarDatos($consultaSQL);

    //Redireccionamiento
    header("location:formulario.php");
}   

?> 