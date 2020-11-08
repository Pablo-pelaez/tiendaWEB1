<?php

include('BaseDatos.php');

//Registrar los productos
if(isset($_POST["botonEnviar"]))
{

    $nombreProducto = $_POST["nombreProducto"];
    $marca = $_POST["marca"];
    $precio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];

    //copia u objeto de la BD
    $transaccion = new BaseDatos();

    //crear consulta
    $consultaSQL="INSERT INTO productos(nombreProducto, marca, precio, descripcion) VALUES ('$nombreProducto', '$marca', '$precio', '$descripcion')";

    //llamo al metodo de la clase agregar BD agregarDatos
    $transaccion->agregarDatos($consultaSQL);
}   

?> 