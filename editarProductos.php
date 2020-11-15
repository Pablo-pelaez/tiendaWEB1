<?php  

include ('BaseDatos.php');


//Crear el objeto de la DB
$transaccion = new BaseDatos();

//Recibir datos
if(isset($_POST["botonEdicion"]))
{
    //Recibir el id que qiero editar
    $id=$_GET["id"];
    
    $nombre = $_POST["nombreEditar"];
    $marca = $_POST["marcaProductoEditar"];
    $precio = $_POST["precioProductoEditar"];
    $descripcion = $_POST["descripcionEditar"];

    //Consulta para editar un registro
    $consultaSQL = "UPDATE productos SET nombreProducto='$nombre' ,marca='$marca', precio='$precio', descripcion='$descripcion' WHERE idProducto='$id' ";

    //Utilizar el método editarDatos
    $transaccion->editarDatos($consultaSQL);

    //Redirección
    header("location:bodegaProductos.php");
    
}


?>