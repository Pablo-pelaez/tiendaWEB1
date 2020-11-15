<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manga Shoppu</title>
    <link rel="icon" href="https://e7.pngegg.com/pngimages/324/645/png-clipart-pokeball-pokeball.png" type="image/png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    <header>
        <div class="jumbotron">
            <h1 class="display-4 font-weight-bold">Manga Shoppu</h1>
            <p class="lead">Bienvenidos a la tienda virtual de Manga. El lugar donde se vale tomarte un break y vivir historias nunca antes vistas.</p>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg mr-3" href="formulario.php" role="button">Registro de productos</a>
            <a class="btn btn-success btn-lg ml-3" href="bodegaProductos.php" role="button">Productos en Bodega</a>
        </div>
    </header>

    <?php

    include('BaseDatos.php');

    //1. Crear un objeto de la clase BaseDatos
    $transaccion = new BaseDatos();

    //2. Definir la consulta para buscar datos
    $consultaSQL = "SELECT * FROM productos WHERE 1";

    //3. Ejecutar el método consultarDatos y almacenar 
    //respuesta en una variable
    $productos = $transaccion->consultarDatos($consultaSQL);

    ?>

    <main>

        <div class="container">

            <div class="card-deck">

                <?php foreach ($productos as $producto) : ?>

                    <div class="col-md-4 mb-5">
                        <div class="card">
                            <img src=" <?php echo ($producto["imagen"]) ?> " class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold"><?php echo ($producto["nombreProducto"]); ?></h3>
                                <h3 class="card-title"><?php echo ($producto["marca"]); ?></h3>
                                <h2 class="card-title text-success"><?php echo ($producto["precio"]); ?></h2>
                                <p class="card-text"><?php echo ($producto["descripcion"]); ?></p>
                                <a href="eliminarProductos.php?id= <?php echo ($producto['idProducto']) ?>" class="btn btn-danger">Eliminar</a>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editar<?php echo ($usuario["idProducto"]) ?>">
                                    Editar Producto
                                </button>
                            </div>
                        </div>

                        <div class="modal fade" id="editar<?php echo ($producto["idProducto"]) ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edición de producto</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="editarProductos.php?id= <?php echo($producto["idProducto"]); ?>" method="POST">

                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" required class="form-control" placeholder="Nombre del producto" name="nombreEditar" value="<?php echo($producto["nombreProducto"]) ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" required class="form-control" placeholder="Marca/Editorial del producto" name="marcaProductoEditar" value=" <?php echo($producto["marca"]) ?> ">
                                                </div>
                                            </div>

                                            <div class="form-group mt-5">
                                                <input type="number" required class="form-control" id="inputAddress2" placeholder="Precio del producto" name="precioProductoEditar" value=" <?php echo($producto["precio"]) ?> ">
                                            </div>
                                            <div class="form-group mt-5">
                                                <!--<input type="text" required class="form-control" id="inputAddress2" placeholder="Descripción del producto" name="descripcionEditar">-->
                                                <textarea required class="form-control" rows="3" placeholder="Descripción del producto" name="descripcionEditar"><?php echo($producto["descripcion"]) ?></textarea>
                                            </div>

                                            <div class="col-md-12 text-center mt-4">
                                                <button type="submit" class="btn btn-info" name="botonEditar">Editar</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

    </main>

    <footer class="page-footer font-small text-light bg-dark pt-4 mt-5">

        <div>

            <ul class="list-unstyled list-inline text-center py-2">
                <li class="list-inline-item">
                    <h5 class="mb-1">Regístrate para más información</h5>
                </li>
                <li class="list-inline-item">
                    <a href="#!" class="btn btn-outline-white btn-rounded bg-light">Registrarse</a>
                </li>
            </ul>

        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://getbootstrap.com//"> Bootstrap Inc.</a>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>