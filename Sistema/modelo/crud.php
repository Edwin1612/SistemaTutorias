<?php

require_once("conexion.php");
//session_start();


class Datos extends Conexion{
        
    #Registro de usuarios
    public function registroUsuarioModel($datosModel){

        $carrera= (int)$datosModel["carrera"];
        $tutor= (int)$datosModel["tutor"];
        $stmt = Conexion::conectar()->prepare("INSERT INTO alumnos (nombre, situacion, correo, idCarrera, idTutor,imagen) VALUES(:nombre, :situacion,
        :correo ,:idCarrera,:idTutor,:imagen) ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":situacion", $datosModel["situacion"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":idCarrera", $carrera);
        $stmt->bindParam(":idTutor", $tutor);
        $stmt->bindParam(":imagen", $datosModel["imagen"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }

        $stmt->close();

    }

    public function AddTutor($datosModel)
    {
        $carrera= (int)$datosModel["carrera"];
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre,correo,contrasena,foto,tipoUsuario,idCarrera) 
        VALUES(:nombre,:correo,:contrasena,:foto,2,:idCarrera) ");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosModel["contrasena"] , PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datosModel["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":idCarrera", $carrera);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function AddCarrera($datosModel)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO carreras (nombre) VALUES(:nombre) ");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function addSeg($datosModel)
    {
        $myid=$_SESSION["idUsuario"];
        $stmt = Conexion::conectar()->prepare('INSERT INTO sesiones (fecha,idAlumno,idUsuario,notacion,idSes) 
        VALUES(NOW(),:idAlumno, :idUsuario,:notacion,:idSes) ');
        $stmt->bindParam(":idAlumno", $datosModel["idAlumno"] , PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $myid);
        $stmt->bindParam(":notacion", $datosModel["notacion"] , PDO::PARAM_STR);
        $stmt->bindParam(":idSes", $datosModel["idSesion"]);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function addSegGrupal($datosModel)
    {
        $myid=$_SESSION["idUsuario"];
        $stmt = Conexion::conectar()->prepare('INSERT INTO sesiones (fecha,idAlumno,idUsuario,notacion,idSes,idGrupal) 
        VALUES(NOW(),:idAlumno, :idUsuario,:notacion,:idSes,:idGrupal) ');
        $stmt->bindParam(":idAlumno", $datosModel["idAlumno"] , PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $myid);
        $stmt->bindParam(":notacion", $datosModel["notacion"] , PDO::PARAM_STR);
        $stmt->bindParam(":idSes", $datosModel["idSesion"]);
        $stmt->bindParam(":idSes", $datosModel["idGrupal"]);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function AddSesionIndividual($datosModel)
    {
        $alumno= (int)$datosModel["alumno"];
        $idUsuario= (int)$_SESSION["idUsuario"];
        $stmt = Conexion::conectar()->prepare('INSERT INTO sesiones (fecha,tipoSesion,idAlumno,idUsuario,estado,notacion,tema) 
        VALUES(NOW(),"Individual",:idAlumno, :idUsuario,"Activa",:notacion,:tema) ');
        //$stmt->bindParam(":nombre", $datosModel["tema"] , PDO::PARAM_STR);
        $stmt->bindParam(":idAlumno",$alumno);
        $stmt->bindParam(":idUsuario",$idUsuario);
        $stmt->bindParam(":notacion",$datosModel["notacion"] , PDO::PARAM_STR);
        $stmt->bindParam(":tema",$datosModel["tema"] , PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }
    public function AddSesionGrupal($datosModel)
    {
        $idUsuario= (int)$_SESSION["idUsuario"];
        $cadena=rand(.0,1000);
        $cadena=$cadena.$_SESSION["idUsuario"];
        foreach($_POST['check_list'] as $checkbox) {
            $cadena=$cadena.$checkbox;
         }

        foreach($_POST['check_list'] as $checkbox) {
            $alumno=(int)$checkbox;
            $stmt = Conexion::conectar()->prepare('INSERT INTO sesiones (fecha,tipoSesion,idAlumno,idUsuario,estado,notacion,tema,idGrupal) 
            VALUES(NOW(),"Grupal",:idAlumno, :idUsuario,"Activa",:notacion,:tema,:idGrupal) ');
            $stmt->bindParam(":idAlumno",$alumno);
            $stmt->bindParam(":idUsuario",$idUsuario);
            $stmt->bindParam(":notacion",$datosModel["notacion"] , PDO::PARAM_STR);
            $stmt->bindParam(":tema",$datosModel["tema"] , PDO::PARAM_STR);
            $stmt->bindParam(":idGrupal",$cadena, PDO::PARAM_STR);
            $stmt->execute();
         }

         return "success";   
    }


    public function AddAlumno($datosModel)
    {
        $tutor = $carrera= (int)$datosModel["tutor"];
        $carrera = $carrera= (int)$datosModel["carrera"];
        $stmt = Conexion::conectar()->prepare("INSERT INTO alumnos (nombre,foto,idCarrera,idUsuario) 
        VALUES(:nombre,:foto,:idCarrera,:idUsuario)");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datosModel["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":idCarrera", $carrera);
        $stmt->bindParam(":idUsuario", $tutor);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function AddAdministrador($datosModel)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre,correo,contrasena,tipoUsuario) 
        VALUES(:nombre,:correo,:contrasena,0)");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosModel["contrasena"] , PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function AddDepartamento($datosModel)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre,correo,contrasena,tipoUsuario) 
        VALUES(:nombre,:correo,:contrasena,1)");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosModel["contrasena"] , PDO::PARAM_STR);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function EditarCarrera($datosModel)
    {
        $id= (int)$datosModel["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE FROM carreras SET nombre=:nombre WHERE idCarrera=:id");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function EditarAlumno($datosModel)
    {
        $id= (int)$datosModel["id"];
        $carrera= (int)$datosModel["carrera"];
        $tutor= (int)$datosModel["tutor"];
        $stmt = Conexion::conectar()->prepare("UPDATE alumnos SET 
        nombre=:nombre, foto=:foto,idCarrera=:idCarrera,idUsuario=:idUsuario WHERE idAlumno=:id");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":foto",$datosModel["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":idCarrera", $carrera);
        $stmt->bindParam(":idUsuario", $tutor);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function EditarTutor($datosModel)
    {
        $id= (int)$datosModel["id"];
        $carrera= (int)$datosModel["carrera"];
        $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET 
        nombre=:nombre,correo=:correo,contrasena=:contrasena, foto=:foto,idCarrera=:idCarrera WHERE idUsuario=:id");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo",$datosModel["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena",$datosModel["contrasena"] , PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datosModel["foto"] , PDO::PARAM_STR);
        $stmt->bindParam(":idCarrera", $carrera);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function editarAdministrador($datosModel)
    {
        $id= (int)$datosModel["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE usuarios SET 
        nombre=:nombre,correo=:correo,contrasena=:contrasena WHERE idUsuario=:id");
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datosModel["contrasena"] , PDO::PARAM_STR);
        $stmt->bindParam(":id", $id);
        if($stmt->execute()){
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function editarUsuarioModel($datosModel){

        $carrera= (int)$datosModel["carrera"];
        $tutor= (int)$datosModel["tutor"];
        $id= (int)$datosModel["id"];
        $stmt = Conexion::conectar()->prepare("UPDATE alumnos  SET nombre=:nombre, situacion=:situacion, correo=:correo, idCarrera=:idCarrera, idTutor=:idTutor,imagen=:imagen  WHERE idAlumno=:id ");
        
        $stmt->bindParam(":nombre", $datosModel["nombre"] , PDO::PARAM_STR);
        $stmt->bindParam(":situacion", $datosModel["situacion"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datosModel["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":idCarrera", $carrera);
        $stmt->bindParam(":idTutor", $tutor);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":imagen", $datosModel["imagen"], PDO::PARAM_STR);

        if($stmt->execute()){
            return 1;
        }else{
            return 0;
        }

        $stmt->close();

    }
//////////////////////////////////////////////////////////////////////////////////////////////////
    public function getUsuariosLogin($datos)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE correo=:correo && contrasena=:contrasena');
        $stmt->bindParam(":correo", $datos["correo"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasena", $datos["contrasena"] , PDO::PARAM_STR);
        if($stmt->execute())
        {
            $respuesta = $stmt->rowCount();
            $resultado =$stmt->fetch();
            session_start();
            $_SESSION["correo"]=$resultado["correo"];
            $_SESSION["nombre"]=$resultado["nombre"];
            $_SESSION["idUsuario"]=$resultado["idUsuario"];
            $_SESSION["contrasena"]=$resultado["contrasena"];
            $_SESSION["foto"]=$resultado["foto"];
            $_SESSION["tipoUsuario"]=$resultado["tipoUsuario"];
            $_SESSION["idCarrera"]=$resultado["idCarrera"];

            return $respuesta;
        }else
        {
            return "error";
        }
        
    }

    public function getReporteSesiones($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from sesiones WHERE idUsuario=:id && idSes=0 && idGrupal=0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function getReporteSesionesGrupales($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from sesiones WHERE idUsuario=:id && idSes=0 && idGrupal!=0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function getReporteSesionesGrupalesTotales()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from sesiones WHERE idSes=0 && idGrupal!=0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function getReporteSesionesHijos($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from sesiones WHERE idUsuario=:id && idSes!=0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function getReporteSesionesHijosTotales()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from sesiones WHERE idSes!=0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function getTutor()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE tipoUsuario=2');
        $stmt->execute();
        return $stmt;
    }
    
    public function getAdministradores()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE tipoUsuario=0');
        $stmt->execute();
        return $stmt;
    }

    public function getDepartamento()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE tipoUsuario=1');
        $stmt->execute();
        return $stmt;
    }

    public function getAdministradoresID($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE tipoUsuario=0 && idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getCarrera()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from carreras');
        $stmt->execute();
        return $stmt;
    }

    public function getCorreo($correo)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios WHERE correo=:correo');
        $stmt->bindParam(":correo",$correo);
        $stmt->execute();
        if($stmt->rowCount()>0)
        {
            return "repetido";
        }else
        {
            return "success";
        }
        
    }

    public function getAlumnos()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from alumnos');
        $stmt->execute();
        return $stmt;
    }

    public function getResiones()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from sesiones WHERE idSes=0');
        $stmt->execute();
        return $stmt;
    }
    
    public function getTutorID($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuarios where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function getAlumnoID($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from alumnos where idAlumno=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
    public function getCarreraID($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from carreras where idCarrera=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function MisTutorados()
    {
        $id=$_SESSION["idUsuario"];
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from alumnos where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function GetMisTutorados()
    {
        $id=$_SESSION["idUsuario"];
        $stmt = Conexion::conectar()->prepare('SELECT *from alumnos where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt;
    }

    public function SessionesActivas()
    {
        $id=$_SESSION["idUsuario"];
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from sesiones where idUsuario=:id && idSes!=0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function SessionesFinalizadaid($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from sesiones where idUsuario=:id && idSes!=0 && estado="finalizada"');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function deleteUsuario($id)
    {
        $stmt = Conexion::conectar()->prepare('DELETE from usuarios where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }

    public function deleteAlumno($id)
    {
        $stmt = Conexion::conectar()->prepare('DELETE from alumnos where idAlumno=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    } 

    public function deleteCarrera($id)
    {
        $stmt = Conexion::conectar()->prepare('DELETE from carreras where idCarrera=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    } 

    public function deleteAdmi($id)
    {
        $stmt = Conexion::conectar()->prepare('DELETE from usuarios where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    } 


    public function countAlumnos()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from alumnos');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    } 

    public function countTutores()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from usuarios where tipoUsuario=1');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    } 

    public function countAdmin()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from usuarios where tipoUsuario=0');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    }

    public function countCarreras()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from carreras');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    }
///////////////////////////////
    public function countTutoradosID($id)
    {
        
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from alumnos WHERE idAlumno=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    } 

    public function countTutoresID()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from usuarios where tipoUsuario=1');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    } 

    public function countAdminID()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from usuarios where tipoUsuario=0');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    }

    public function countCarrerasID()
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from carreras');
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    }

    public function countAlumnoSesiones($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from sesiones WHERE idAlumno=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    }

    public function countAlumnoReportes($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT count(*) from sesiones WHERE idAlumno=:id && idSes != 0');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $resultado=$stmt->fetch();
        return $resultado;
    }
   /* public function IniciarSesionModel($datosModel)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuario WHERE usuario=:usuario && contrasena=:contrasea');
        $stmt->bindParam(":usuario", $datosModel["usuario"] , PDO::PARAM_STR);
        $stmt->bindParam(":contrasea", $datosModel["password"], PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount()==1){
            session_start();
            $_SESSION["usuario"]=$datosModel["usuario"];
            $_SESSION["contrasena"]=$datosModel["password"];
            return "success";
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function getUsuarios()
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuario');
        $stmt->execute();
        return $stmt;
    }

    public function getUsuariosID($id)
    {
        $stmt = Conexion::conectar()->prepare('SELECT *from usuario where idUsuario=:id');
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    //Metodo que con mediante setencias sql con PDO se editan datos, agrege el MD5 por seguridad ya que envio la contraseña de la sesion por get, para que no puedan
    //obtener la contraseña de una manera facil
    public function updateUsuariosModel($datosModel)
    {
            $stmt = Conexion::conectar()->prepare("UPDATE usuario SET usuario=:usuario, contrasena=:contrasena, correo=:correo WHERE idUsuario=:id");
            $stmt->bindParam(":usuario",$datosModel["usuario"]);
            $stmt->bindParam(":contrasena",$datosModel["contrasena"]);
            $stmt->bindParam(":correo",$datosModel["correo"]);
            $stmt->bindParam(":id",$datosModel["id"]);
            if($stmt->execute())
            {
                return "success";
            }
            else 
            { return "error";}
    }
    //Metodo que elimina al usuario con sentencia sql y PDO , al igual que el de editar se agrega la contraseña para saber si sera capaz de poder elimianr la info
    public function eliminarUsuario($datosModel){
        if(MD5($datosModel["Pas1"])== $datosModel["Pas2"])
        {
            $stmt = Conexion::conectar()->prepare("DELETE FROM usuario WHERE idUsuario=:id");
            $stmt->bindParam(":id",$datosModel["id"]);
            if($stmt->execute())
            {
                return "success";
            }
        }else
        {
            return "error";
        }

    }*/

}