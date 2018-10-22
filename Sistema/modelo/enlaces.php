<?php
    class Paginas{

        //Una funcion con el parametro $enlacesModel que se recibe a traves del controlador
        
        public function enlacesPaginasModel($enlacesModel){
            //Validamos
            if($_SESSION["tipoUsuario"]==0)
                {           
                    if($enlacesModel == "ListadoCarrera" 
                    || $enlacesModel == "editarCarreraYep"  || $enlacesModel == "salir" || $enlacesModel=="AgregarCarrera" 
                    || $enlacesModel=="eliminar" || $enlacesModel=="plantilla" || $enlacesModel=="perfil" || $enlacesModel=="ListadoCarrera" 
                    || $enlacesModel=="editarCarrera" || $enlacesModel=="agregarTutor" || $enlacesModel=="ListadoTutor" 
                    || $enlacesModel=="editarTutor"  || $enlacesModel=="borrarTutor" || $enlacesModel=="Tutorados"  || $enlacesModel=="agregarAlumno"
                    || $enlacesModel=="ListadoAlumno" || $enlacesModel=="editarAlumno" || $enlacesModel=="eliminarAlumno" 
                    || $enlacesModel=="ListadoAdministradores" 
                    || $enlacesModel=="agregarAdministrador" || $enlacesModel=="editarAdministrador" 
                    || $enlacesModel=="eliminarAdministrador" || $enlacesModel== "inicio0" || $enlacesModel== "departamentoAgregar" || $enlacesModel== "ListadoDepartamento"
                    || $enlacesModel== "editarDepartamento" || $enlacesModel== "eliminarDepartamento" || $enlacesModel== "Activas" || $enlacesModel== "Finalizadas"
                    || $enlacesModel== "Informacion"  || $enlacesModel== "AsesoriaTotales"
                    || $enlacesModel== "reportesTotales" || $enlacesModel== "reportesSesTotales"
                    ){
                        //Mostramos el URL concatenado con la variable $enlacesModel
                        $module = "vista/modulos/".$enlacesModel.".php";
                    }
                } 

            if($_SESSION["tipoUsuario"]==1)
            {           
                if($enlacesModel == "salir" || $enlacesModel== "inicio1" || $enlacesModel== "agregarAlumno" || $enlacesModel== "ListadoAlumno" 
                || $enlacesModel== "eliminarAlumno" || $enlacesModel== "editarAlumno" || $enlacesModel== "borrarTutor" 
                || $enlacesModel== "ListadoTutor" || $enlacesModel== "agregarTutor" || $enlacesModel== "editarTutor" || $enlacesModel== "misTutorados" || $enlacesModel== "seguimiento"
                || $enlacesModel== "Asesoria" || $enlacesModel== "individual" || $enlacesModel== "grupal"  || $enlacesModel== "reportes"  
                || $enlacesModel== "reportesSes"  || $enlacesModel== "seguimientoGrupal" || $enlacesModel== "resultadosss" || $enlacesModel== "AsesoriaTotales"
                || $enlacesModel== "reportesTotales" || $enlacesModel== "reportesSesTotales"
                ){
                    
                    $module = "vista/modulos/".$enlacesModel.".php";
                }else
                {
                    $module = "vista/modulos/inicio.php";
                }
            } 

            if($_SESSION["tipoUsuario"]==2)
            {           
                if($enlacesModel == "salir" || $enlacesModel== "inicio2"  || $enlacesModel== "misTutorados" || $enlacesModel== "seguimiento"
                || $enlacesModel== "Asesoria" || $enlacesModel== "individual" || $enlacesModel== "grupal"  || $enlacesModel== "reportes"  
                || $enlacesModel== "reportesSes"  || $enlacesModel== "seguimientoGrupal" || $enlacesModel== "resultadosss"    
                ){
                    //Mostramos el URL concatenado con la variable $enlacesModel
                    $module = "vista/modulos/".$enlacesModel.".php";
                }else
                {
                    $module = "vista/modulos/inicio.php";
                }
            }

            /*if($enlacesModel== "inicio"){
                //Mostramos el URL concatenado con la variable $enlacesModel
                $module = "vista/modulos/".$enlacesModel.".php";
            }
                  
            
            //Una vez que action vienen vacio (validnaod en el controlador) enctonces se consulta si la variable $enlacesModel es igual a la cadena index de ser asi se muestre index.php
            else if($enlacesModel == "index"){
                $module = "views/modules/registro.php";
            }
            else if($enlacesModel == "ok"){
                $module = "views/modules/registro.php";
            }
            else if($enlacesModel == "fallo"){
                $module = "views/modules/ingresar.php";
            }
            else if($enlacesModel == "cambio"){
                $module = "views/modules/usuario.php";
            }else if($enlacesModel=="SiExiste")
            {//Se agregan estos modulos los cuales son los extras en la actividad
                $module = "views/modules/siExiste.php";
            }else if ($enlacesModel=="salir")
            {
                $module = "views/modules/salir.php";
            }else if($enlacesModel=="usuarios")
            {
                $module = "views/modules/usuarios.php";
            }
            else if($enlacesModel=="eliminar")
            {
                $module = "views/modules/eliminar.php";
            }
            //Validar una LISTA BLANCA 
            else{
                $module = "views/modules/registro.php";
            }*/
    
            return $module;
        }
    
    }
    
    
?>