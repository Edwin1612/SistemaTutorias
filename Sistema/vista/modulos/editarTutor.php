<?php
    $stmt =	Datos::getCarrera();
    $registro = new MvcControlador();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $resultado= $registro -> EditarTutor();
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        echo $id;
        $stmt2 =Datos::getTutorID($id);
    }
    
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
        if($resultado=="repetido")
        {
            echo '
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Correo Repetido</h4>
                Intenta con otro correo electronico
            </div>';
        }

    ?>
    <div align="center">
        <h1>Editar Tutor</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Ingrese los datos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST" enctype="multipart/form-data" action="index.php?action=editarTutor&id=<?=$id?>">
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nombre del Tutor</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" value="<?php if(isset($stmt2["nombre"])){echo $stmt2["nombre"];}?>">
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Correo</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Correo" name="correo" value="<?php if(isset($stmt2["correo"])){echo $stmt2["correo"];}?>"> 
                    </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Contraseña</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Contraseña" name="contrasena" value="<?php if(isset($stmt2["contrasena"])){echo $stmt2["contrasena"];}?>">
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
                  <br>
                    <button type="submit" class="btn btn-primary" >Agregar Tutor</button><br><br>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>