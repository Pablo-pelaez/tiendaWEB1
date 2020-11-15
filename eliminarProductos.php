<?php

    include ('BaseDatos.php');

    //Eliminar registros

    //Recibo el id que voy a eliminar
    $idEliminar = ($_GET["id"]);

    //Crear el objeto de la clase BaseDatos
    $transaccion = new BaseDatos();

    //Crear la consulta para eliminar
    $consultaSQL = "DELETE FROM productos WHERE idProducto='$idEliminar'";

    //Utilizar el método para eliminar
    $transaccion->eliminarDatos($consultaSQL);

    //Redireccionamiento
    header("location:bodegaProductos.php");


?>