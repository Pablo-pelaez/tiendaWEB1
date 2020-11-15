<?php  

include ('BaseDatos.php');


//Crear el objeto de la DB
$transaccion = new BaseDatos();

//Recibir datos
if(isset($_POST["botonEditar"]))
{
    //Recibir el id que qiero editar
    $id=$_GET["id"];
    
    $nombre = $_POST["nombreEditar"];
    $marcaProducto = ["marcaProductoEditar"];
    $precioProducto = ["precioProductoEditar"];
    $descripcionProducto = $_POST["descripcionEditar"];

    //Consulta para editar un registro
    $consultaSQL = "UPDATE productos SET nombreEditar='$nombreProducto' ,desccripcionEditar='$descripcionProducto' WHERE idProducto='$id' ";

    //Utilizar el método editarDatos
    $transaccion->editarDatos($consultaSQL);

    //Redirección
    header("location:listaUsuarios.php");
    
}


?>