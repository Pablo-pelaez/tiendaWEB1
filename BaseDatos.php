<?php

    class BaseDatos
    {
        //Atributos
        public $usuarioDB="root";
        public $passwordDB="";

        //Constructor
        public function __construct(){ }

        //Métodos/Funciones
        public function conectarDB()
        {
            try
            {
                $datosDB = "mysql:host=localhost;dbname=tiendaweb1";

                $conexionDB = new PDO($datosDB, $this->usuarioDB, $this->passwordDB);

                return ($conexionDB);
            }
            catch(PDOException $error)
            {
                echo($error->getMessage());
            }
        }

        public function agregarDatos($consultaSQL)
        {
            //establecer una conexión
            $conexionBD = $this->conectarDB();
    
            //preparar una consulta
            $insertarDatos = $conexionBD->prepare($consultaSQL);
    
            //ejecutar la consulta
            $resultado = $insertarDatos->execute();
    
            //verifico resultado
            if($resultado)
            {
                echo("Producto agregado");
            }
            else
            {
                echo("error al agregar el producto");  
            }
        }
    
        public function consultarDatos($consultaSQL)
        {
            //establecer una conexión
            $conexionBD = $this->conectarDB();
    
            //preparar una consulta
            $consultarDatos = $conexionBD->prepare($consultaSQL);
    
            //Establecer el método de consulta
            $consultarDatos->setFetchMode(PDO:: FETCH_ASSOC);
    
            //Ejecutar la operación de la BD
            $consultarDatos->execute();
    
            //Retornar datos consultados
            return ($consultarDatos->fetchAll());
        }
    
        public function eliminarDatos($consultaSQL)
        {
            //establecer una conexión
            $conexionBD = $this->conectarDB();
    
            //preparar una consulta
            $eliminarDatos = $conexionBD->prepare($consultaSQL);
    
            //Ejecutar consulta
            $resultado = $eliminarDatos->execute();
    
            //verifico resultado
            if($resultado)
            {
                echo("Producto eliminado de forma correcta");
            }
            else
            {
                echo("Error al eliminar el producto");   //documentacion para lanzar error
            }
    
        }


    }

?>