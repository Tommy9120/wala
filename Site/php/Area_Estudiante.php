<DOCTYPE! html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<title>E-campus Estudiante</title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
    </head>
        <body>
            <?php
                include('php/funciones.php');
                $fun = new Funciones();
                $fun->Cuidar_Sesion();

            ?>
             

<body>

      

<div class="container">
 
    <div class="col-sm-3 sidenav">
            <?php 
                include('php/conexion.php');
                $consulta_estudiante = "SELECT est_codigo_estudiante, CONCAT(est_nombre, ' ', est_apellido) AS nombre  FROM d_estudiante WHERE est_usuario = '". $_SESSION["usuario"] ."'";
                $resultado_consulta_estudiante = $conexion->prepare($consulta_estudiante);
                $resultado_consulta_estudiante->execute();
                $f=$resultado_consulta_estudiante->fetch();
                echo "<h2>Estudiante <br>".$f['nombre']."</h2>"  ;
                
             ?>
         <center><img src="imagenes/femina.jpg" class="img-responsive" alt="Cinque Terre" width="150" height="150"></center> <Br><Br>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a data-toggle="pill" href="#datos_generales">Home</a></li>
                <li><a data-toggle="pill" href="#horario">Horario</a></li>
                <li><a data-toggle="pill" href="#notas">Notas</a></li>
                <li><a data-toggle="pill" href="#pemsum">Pemsun</a></li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Actualizar
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a data-toggle="pill" href="#updatedatospersonales">Datos Personales</a></li>
                    <li><a data-toggle="pill" href="#updatedatosacudiente">Datos del Acudiente</a></li>
                    <li><a data-toggle="pill" href="#updatedatoslaborales">Datos Laborales</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Ajustes
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a data-toggle="pill" href="#datospersonales">Cambiar Contraseña</a></li>
                    <li><a data-toggle="pill" href="#datosacudiente">Cambiar Fondo</a></li>
                    <li><a data-toggle="pill" href="#datoslaborales">Cambiar Foto</a></li>
                    </ul>
                </li>
            </ul><br>
      
    </div>

    
            <div class="col-sm-9">
    <div class="tab-content">
                <div id="datos_generales" class="tab-pane fade in active">
                    <h4><small>e-campus Unimeta</small></h4>
                    <hr>
                    <h2>Bienvenidos</h2>
                    <p>plataforma e-campus de la corporacion universitaria del Meta.</p>
                    <?php
                        include('php/datos_generales.php');
                        $datos = new Datos_Generales();
                        $datos->Informacion_General($f['est_codigo_estudiante']);
                    ?>

                </div>
            

            
                <div id="horario" class="tab-pane fade ">
                    <h4><small>e-campus Unimeta</small></h4>
                    <h2>Datos</h2>
                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            
            
            <div id="notas" class="tab-pane fade ">
                    <h4><small>e-campus Unimeta</small></h4>
                    <h2>Datos</h2>
                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            

            <div id="pemsun" class="tab-pane fade ">
                    <h4><small>e-campus Unimeta</small></h4>
                    <h2>Datos</h2>
                    <p>Food is my passion. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>

            <!--ACTUALIZACION DE DATOS PERSONALES DEL ESTUDIANTE-->
            <div id="updatedatospersonales" class="tab-pane fade ">
                    <h4><small>e-campus Unimeta</small></h4>
                    <h2>Actualizacion de Datos Personales </h2>
                    <?php
                    include('php/update_datos_estudiante.php');
                    $update = new Update_Estudiante();
                    $update->Dates_For_Update($f['est_codigo_estudiante']);
                    
                    ?>

            </div>


            <!--ACTUALIZACION DE DATOS ACUDIENTE DEL ESTUDIANTE-->
            <div id="updatedatosacudiente" class="tab-pane fade ">
                    <h4><small>e-campus Unimeta</small></h4>
                    <h2>Actualizacion de Datos del Acudiente </h2>
                    <?php
                    include('php/update_datos_acudiente.php');
                    $update = new Update_Acudiente();
                    $update->Dates_For_Tutor($f['est_codigo_estudiante']);
                    
                    ?>

            </div>


            <!--ACTUALIZACION DE DATOS LABORALES DEL ESTUDIANTE-->
            <div id="updatedatoslaborales" class="tab-pane fade ">
                    <h4><small>e-campus Unimeta</small></h4>
                    <h2>Actualizacion de Datos Laborales del Estudiante </h2>
                    <?php
                    include('php/update_datos_laborales.php');
                    $update = new Update_Laborales();
                    $update->Dates_Laborales($f['est_codigo_estudiante']);
                    
                    ?>

            </div>
            

           

        </div>
           
       </div> 
</div>

        <footer class="pie_pagina container-fluid">
            <p>Footer Text</p>
            </footer>
             
            <script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        </body>
</html>
