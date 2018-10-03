<?php
    $usuario="root";
    $contraseña= "";
    try{
    $conexion = new PDO("mysql:host=localhost; dbname=registro", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET utf8");
     
    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>