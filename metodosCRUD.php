<?php

include('BaseDatos.php');

//Registrar los productos
if(isset($_POST["botonEnvio"]))
{

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $descripcion = $_POST["descripcion"];
    $genero = $_POST["genero"];

    //copia u objeto de la BD
    $transaccion = new BaseDatos();

    //crear consulta
    $consultaSQL="INSERT INTO usuarios(nombre, apellidos, descripcion, genero) VALUES ('$nombre', '$apellido', '$descripcion', '$genero')";

    //llamo al metodo de la clase agregar BD agregarDatos
    $transaccion->agregarDatos($consultaSQL);
}   

    //Eliminar registros

    //Recibo el id que voy a eliminar
    $idEliminar = ($_GET["id"]);

    //Crear el objeto de la clase BaseDatos
    $transaccion = new BaseDatos();

    //Crear la consulta para eliminar
    $consultaSQL = "DELETE FROM usuarios WHERE idUsuario='$idEliminar' ";

    //Utilizar el método para eliminar
    $transaccion->eliminarDatos($consultaSQL);

?> 