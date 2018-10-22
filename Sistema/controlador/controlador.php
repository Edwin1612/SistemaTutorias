<?php
class MvcControlador
{
    public function Plantilla()
    {
        include "vista/plantilla.php";
    }

    public function login()
    {
        include("vista/modulos/login.php");
    }

    public function enlacesPaginasControlador()
    {
        if(isset($_GET['action'])){
            //guardar el valor de la variable action en views/modules/navegacion.php en el cual se recibe mediante el metodo get esa variable
            $enlaces = $_GET['action'];
        }else{
            //Si viene vacio inicializo con index
            $enlaces = "index";
        }
        $respuesta = Paginas::enlacesPaginasModel($enlaces);

        include $respuesta;
        
    }

    public function agregarUsuario()
    {
        if(isset($_POST["usuarioRegistro"]) && isset($_POST["passwordRegistro"]))
        {
            $datos = array("usuario"=>$_POST["usuarioRegistro"] , "contrasena"=>$_POST["passwordRegistro"]);
            $respuesta = Paginas::agregarUsuarioModelo($datos);
        }
        
    }

    public function Log()
    {
        if(isset($_POST["correo"]) && isset($_POST["pass"]))
        {
            $datos = array("correo"=>$_POST["correo"] , "contrasena"=>$_POST["pass"]);
            $respuesta = Datos::getUsuariosLogin($datos);
            return $respuesta;
        }
        
    }
//////////////////////////////////////
    public function AddCarrera()
    {
        if(isset($_POST["nombre"]) && isset($_POST["texto"]))
        {
            $datos = array("nombre"=>$_POST["nombre"] , "texto"=>$_POST["texto"]);
            $respuesta = Datos::AddCarrera($datos);
            return $respuesta;
        }
        
    }

    public function AddAlumno()
    {
        if(isset($_POST["nombre"]) && isset($_POST["carrera"]) && isset($_FILES['foto']) && isset($_POST['tutor']))
        {
            $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                     //echo 'Pesa menos de 1 MB';
                }
           }

           $ruta_indexphp = dirname(realpath(__FILE__));
            $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                    //echo 'Pesa menos de 1 MB';
                    if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                    }
                }
            }
            $datos = array("nombre"=>$_POST["nombre"] , "foto"=>$ruta_nuevo_destino , "carrera"=>$_POST["carrera"], "tutor"=> $_POST['tutor']);
            $respuesta = Datos::AddAlumno($datos);
            return $respuesta;
        }
        
    }
    public function AddTutor()
    {
        if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_FILES['foto']) && isset($_POST["carrera"]))
        {
            $respuesta = Datos::getCorreo($_POST["correo"]);
            if($respuesta=="success")
            {   
                $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
                $max_tamanyo = 1024 * 1024 * 8;
                if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                    //echo 'Es una imagen';
                    if ( $_FILES['foto']['size']< $max_tamanyo ) {
                            //echo 'Pesa menos de 1 MB';
                    }
                }

                $ruta_indexphp = dirname(realpath(__FILE__));
                $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
                $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
                if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                    //echo 'Es una imagen';
                    if ( $_FILES['foto']['size']< $max_tamanyo ) {
                        //echo 'Pesa menos de 1 MB';
                        if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                        }
                    }
                }

                $datos = array("nombre"=>$_POST["nombre"] , "correo"=>$_POST["correo"],"contrasena"=>$_POST["contrasena"],"foto"=>$ruta_nuevo_destino,
                "carrera"=>$_POST["carrera"]);
                Datos::AddTutor($datos);
                return $respuesta;
            }else
            {
                return $respuesta;
            }
        }
        
    }

    public function AddAdministrador()
    {
        if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]))
        {
            $respuesta = Datos::getCorreo($_POST["correo"]);
            if($respuesta=="success")
            {   
                $datos = array("nombre"=>$_POST["nombre"] , "correo"=>$_POST["correo"],"contrasena"=>$_POST["contrasena"]);
                print_r($datos);
                $respuesta = Datos::AddAdministrador($datos);
                return $respuesta;
            }else
            {
                return $respuesta;
            }

            
        }
        
    }

    public function addSeg()
    {
        if(isset($_POST["notacion"]) && isset($_GET["id"]) && isset($_GET["idSes"]))
        {
            
            
            $datos = array("notacion"=>$_POST["notacion"] , "idAlumno"=>$_GET["id"],"idSesion"=>$_GET["idSes"]);
            print_r($datos);
            $respuesta = Datos::addSeg($datos);
            return $respuesta;

        }

            
    }

    public function addSegGrupal()
    {
        if(isset($_POST["notacion"]) && isset($_GET["id"]) && isset($_GET["idSes"]) && isset($_GET["idGrupal"]))
        {
            
            
            $datos = array("notacion"=>$_POST["notacion"] , "idAlumno"=>$_GET["id"],"idSesion"=>$_GET["idSes"], "idGrupal"=>$_GET["idGrupal"]);
            print_r($datos);
            $respuesta = Datos::addSeg($datos);
            return $respuesta;

        }

            
    }

    public function AddSesion()
    {
        if(isset($_POST["tema"]) && isset($_POST["notacion"]) && isset($_POST["alumno"]) && isset($_POST["vehicle"]))
        {
            
            
            $datos = array("tema"=>$_POST["tema"] , "notacion"=>$_POST["notacion"],"alumno"=>$_POST["alumno"]);
            print_r($datos);
            $respuesta = Datos::AddSesionIndividual($datos);
            return $respuesta;

        }

            
    }

    public function AddSesionGrupal()
    {
        if(isset($_POST["tema"]) && isset($_POST["notacion"]) && isset($_POST['check_list']))
        {
            
            
            $datos = array("tema"=>$_POST["tema"] , "notacion"=>$_POST["notacion"], "Prueba"=>$_POST["check_list"]);
            print_r($datos);
            $respuesta = Datos::AddSesionGrupal($datos);
            //return $respuesta;

        }

            
    }
        
    

    public function AddDepartamento()
    {
        if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]))
        {
            $respuesta = Datos::getCorreo($_POST["correo"]);
            if($respuesta=="success")
            {   
                $datos = array("nombre"=>$_POST["nombre"] , "correo"=>$_POST["correo"],"contrasena"=>$_POST["contrasena"]);
                print_r($datos);
                $respuesta = Datos::AddDepartamento($datos);
                return $respuesta;
            }else
            {
                return $respuesta;
            }

            
        }
        
    }
//////////////////////////////////////////////////
    public function EditarTutor()
    {
        if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_FILES['foto']) && isset($_POST["carrera"]) 
        && isset($_GET["id"]))
        {
            $respuesta = Datos::getCorreo($_POST["correo"]);
            if($respuesta=="success")
            {
                $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
                $max_tamanyo = 1024 * 1024 * 8;
                if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                    //echo 'Es una imagen';
                    if ( $_FILES['foto']['size']< $max_tamanyo ) {
                        //echo 'Pesa menos de 1 MB';
                    }
                }

                $ruta_indexphp = dirname(realpath(__FILE__));
                $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
                $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
                if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                    //echo 'Es una imagen';
                    if ( $_FILES['foto']['size']< $max_tamanyo ) {
                        //echo 'Pesa menos de 1 MB';
                        if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                            echo 'Fichero guardado con éxito';
                        }
                    }
                }

                $datos = array("nombre"=>$_POST["nombre"] , "correo"=>$_POST["correo"],"contrasena"=>$_POST["contrasena"],"foto"=>$ruta_nuevo_destino,
                "carrera"=>$_POST["carrera"],"id"=>$_GET["id"]);
                print_r($datos);
                $respuesta = Datos::EditarTutor($datos);
                return $respuesta;
            }else
            {
                return $respuesta;
            }
        }
        
    }

    public function editarAlumno()
    {
        if(isset($_POST["nombre"]) && isset($_POST["carrera"]) && isset($_FILES['foto']) && isset($_POST["tutor"]) && isset($_GET["id"]))
        {
            $extensiones = array(0=>'image/jpg',1=>'image/jpeg',2=>'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                     //echo 'Pesa menos de 1 MB';
                }
           }

           $ruta_indexphp = dirname(realpath(__FILE__));
            $ruta_fichero_origen = $_FILES['foto']['tmp_name'];
            $ruta_nuevo_destino = 'imagenes/' .rand(1,1000000). $_FILES['foto']['name'];
            if ( in_array($_FILES['foto']['type'], $extensiones) ) {
                //echo 'Es una imagen';
                if ( $_FILES['foto']['size']< $max_tamanyo ) {
                    //echo 'Pesa menos de 1 MB';
                    if( move_uploaded_file ( $ruta_fichero_origen, $ruta_nuevo_destino ) ) {
                        echo 'Fichero guardado con éxito';
                    }
                }
            }

            $datos = array("nombre"=>$_POST["nombre"],"foto"=>$ruta_nuevo_destino,
            "carrera"=>$_POST["carrera"],"tutor"=>$_POST["tutor"],"id"=>$_GET["id"]);
            print_r($datos);
            $respuesta = Datos::EditarAlumno($datos);
            return $respuesta;
        }
        
    }

    public function EditarCarrera()
    {
        if(isset($_POST["nombre"]) && isset($_POST["texto"]) && isset($_GET["id2"]))
        {
            $datos = array("nombre"=>$_POST["nombre"] , "texto"=>$_POST["texto"], "id"=>$_GET["id2"]);
            $respuesta = Datos::AddCarrera($datos);
            return $respuesta;
        }
        
    }

    public function editarAdministrador()
    {
        if(isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contrasena"]) && isset($_GET["id"]))
        {
            $datos = array("nombre"=>$_POST["nombre"] , "correo"=>$_POST["correo"], "contrasena"=>$_POST["contrasena"],"id"=>$_GET["id"]);
            $respuesta = Datos::editarAdministrador($datos);
            print_r($datos);
            return $respuesta;
        }
        
    }
}
?>