<?php
    
 
     class Funciones 
     {

       
         
        public function Cuidar_Sesion()
        {
            session_start();
                if(!isset($_SESSION['usuario']))
                {
                    header("Location: Login_Estudiante.php");
                }
        }

        
        public function Logue($date,$date2,$date3,$date4)
        {
            include('conexion.php');
         //$contraseña = mysqli_real_escape_string($conexion,$_POST['contraseña']);
		//$error = '';

		//$sha_1 = sha1($contraseña);

            $consulta = "SELECT * FROM $date 
                        WHERE $date3 = :usu AND $date4 = :clave";

            $Resultado_Consulta = $conexion->prepare($consulta);

            $usuario = htmlentities(addslashes($_POST['usuario']));
            $contraseña = htmlentities(addslashes($_POST['contraseña']));
            $contraseñaen = sha1($contraseña);

            $Resultado_Consulta->bindValue(":usu",$usuario);
            $Resultado_Consulta->bindValue(":clave",$contraseñaen);

            $Resultado_Consulta->execute();

            $numero_filas = $Resultado_Consulta->rowCount();

                if($numero_filas != 0)
                {
                    session_start();
                    $_SESSION['usuario'] = $_POST['usuario'];
                    //$fila = $resultado->fetch_assoc();
                    //$_SESSION['codigo'] = $fila ('est_codigo_estudiante');
                    //$_SESSION['nombre'] = $fila ('Nombre');

                    header("location: ".$date2);
                }else
                {
                    //$error = "el nombre o contraseña  son incorrectos";
                    header("location: index.php");
                }
        }//CIERRA FUNCION LOGUE

        public function Cerrar_Sesion() //FUNCION PARA CERRAR SESION DE CUALQUIER USUARIIO
        {
            session_start();
            session_destroy();
            header("location: Index.php");
        }

        public function Lista_Departamento()//FUNCION PARA LLAMAR LA LISTA DE DEPARTAMENTOS
        {
            include('conexion.php');
            $Consulta_Departamento = "SELECT * FROM p_departamento ORDER BY dep_nombre";
			    $Resultado_Consulta_Departamento = $conexion->prepare($Consulta_Departamento);
                    $Resultado_Consulta_Departamento->execute();
					    while ($f = $Resultado_Consulta_Departamento->fetch())	
                        {
						    echo '<option value="'.$f[dep_codigo].'">'.$f[dep_nombre].'</option>';
                        }
        }//CIERRA FUNCION LISTA DE DEPARTAMENTOS

        

        public function Lista_Ciudades()//FUNCION PARA LLAMAR LA LISTA DE DEPARTAMENTOS
        {
            
            include('conexion.php');
            

            $Consulta_Ciudad = "SELECT * FROM p_ciudad  ORDER BY ciud_nombre";
			    $Resultado_Consulta_Ciudad = $conexion->prepare($Consulta_Ciudad);
                    $Resultado_Consulta_Ciudad->execute();
					    while ($f = $Resultado_Consulta_Ciudad->fetch())	
                        {
						    echo '<option value="'.$f[ciud_codigo].'">'.$f[ciud_nombre].'</option>';
                        }
                        
        }//CIERRA FUNCION LISTA DE CIUDADES


        public function Lista_DepartamentoUpdate()//FUNCION PARA LLAMAR LA LISTA DE DEPARTAMENTOS
        {
            include('conexion.php');
            $Consulta_Departamento = "SELECT * FROM p_departamento ORDER BY dep_nombre";
			    $Resultado_Consulta_Departamento = $conexion->prepare($Consulta_Departamento);
                    $Resultado_Consulta_Departamento->execute();
					    while ($f = $Resultado_Consulta_Departamento->fetch())	
                        {
						    echo '<option value="'.$f[dep_codigo].'">'.$f[dep_nombre].'</option>';
                        }
        }//CIERRA FUNCION LISTA DE DEPARTAMENTOS

        public function Lista_CiudadesUpdate()//FUNCION PARA LLAMAR LA LISTA DE DEPARTAMENTOS
        {
            
            include('conexion.php');
            

            $Consulta_Ciudad = "SELECT * FROM p_ciudad  ORDER BY ciud_nombre";
			    $Resultado_Consulta_Ciudad = $conexion->prepare($Consulta_Ciudad);
                    $Resultado_Consulta_Ciudad->execute();
					    while ($f = $Resultado_Consulta_Ciudad->fetch())	
                        {
						    echo '<option value="'.$f[ciud_codigo].'">'.$f[ciud_nombre].'</option>';
                        }
                        
        }//CIERRA FUNCION LISTA DE CIUDADES

        public function Estado_Civil()
        {
            include('conexion.php');
            $Consulta_Estado_Civil = "SELECT * FROM p_estado_civil ORDER BY civ_nombre";
                $Resultado_Consulta_Estado_Civil = $conexion->prepare($Consulta_Estado_Civil);
                    $Resultado_Consulta_Estado_Civil->execute();
                        while ($a = $Resultado_Consulta_Estado_Civil->fetch())
                        {
                            echo '<option value="'.$a[civ_codigo].'">'.$a[civ_nombre].'</option>';
                        }

        }//CIERRA FUNCION ESTADO CIVIL

        public function Carrera()
        {
            include('conexion.php');
            $Consulta_Carrera = "SELECT * FROM p_carrera ORDER BY car_nombre";
                $Resultado_Consulta_Carrera = $conexion->prepare($Consulta_Carrera);
                    $Resultado_Consulta_Carrera->execute();
                        while ($a = $Resultado_Consulta_Carrera->fetch())
                        {
                            echo '<option value="'.$a[car_codigo].'">'.$a[car_nombre].'</option>';
                        }

        }//CIERRA FUNCION CARRERA

        public function Lista_Colegios()
        {
            include('conexion.php');
            $Consulta_Colegios = "SELECT * FROM d_IESecundaria ORDER BY IES_nombre";
                $Resultado_Consulta_Colegios = $conexion->prepare($Consulta_Colegios);
                    $Resultado_Consulta_Colegios->execute();
                        while ($a = $Resultado_Consulta_Colegios->fetch())
                        {
                            echo '<option value="'.$a[IES_codigo].'">'.$a[IES_nombre].'</option>';
                        }

        }//CIERRA FUNCION CARRERA

    }// CIERRA CLASS
?>