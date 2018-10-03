<?php
    $usuario="somoswal_server";
    $contraseña= "somoswala123*";
    try{
    $conexion = new PDO("mysql:host=108.167.149.251; dbname=somoswal_wala", $usuario, $contraseña);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET utf8");

    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>
