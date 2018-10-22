
<?php
$stmt =	Datos::getCarrera();
$stmt2 =	Datos::getTutor();
$registro = new MvcControlador();
if(isset($_GET["id"]))
{
    $id =$_GET["id"];
    $stmt3= Datos::getAlumnoID($id);
}
//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro -> editarAlumno();
?>

<div class="col-md-12">
    <?php
        if($resultado=="success")
        {   echo '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Correcto!</h4>
                Agregado Satisfactoriamente 
            </div>';
        }

    ?>


    <div align="center">
        <h1>Agregar Alumno</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Ingrese los datos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data" action="index.php?action=editarAlumno&id=<?=$id ?>">
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Alumno</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="nombre" value="<?php if(isset($stmt3["nombre"])){echo $stmt3["nombre"];}?>">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Foto</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" placeholder="" name="foto">
                    </div>
                    <label for="">Carrera</label>
                    <select class="form-control" name="carrera">
                        <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                        {?>
                            <option value="<?= $datos["idCarrera"] ?>"><?= $datos["nombre"] ?></option>
                        <?php }?>
                    
                    </select>

                    <label for="">Tutores</label>
                    <select class="form-control" name="tutor">
                        <?php while($datos = $stmt2->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                        {?>
                            <option value="<?= $datos["idUsuario"] ?>"><?= $datos["nombre"] ?></option>
                        <?php }?>
                    
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary" >Agregar Carrera</button><br><br>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>