<<?php
    $stmt= Datos::GetMisTutorados(); 
    $registro = new MvcControlador();
    $resultado= $registro -> AddSesion();
?>


<div class="col-md-12">

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Asesoria Individual</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-1 control-label">Tema</label>

                    <div class="col-sm-10">
                        <select class="form-control" name="tema">
                            <option value="Economico">Economico</option>
                            <option value="Academico">Academico</option>
                            <option value="Noviazgo">Noviazgo</option>
                            <option value="Noviazgo">Sentimental</option>
                            <option value="otra">Otra</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-lg-1 control-label">Notaciones</label>

                    <div class="col-sm-8 col-md-offset-1">
                        <div class="form-group">
                        <textarea class="form-control" rows="20" placeholder="Enter ..." name="notacion"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-md-offset-2">                
                    <div class="form-group">
                        <label>Alumno</label>
                        <select class="form-control" name="alumno">
                        <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                        //Se hace un array asociativo para poder sacar los valores
                            {?>
                            <option value="<?= $datos["idAlumno"] ?>"><?=$datos["nombre"]?></option>
                            <?php }?>
                        </select>
                    </div>
                </div><br><br>


                <!-- /.box-body -->
                <div class="col-md-12" align="center">
                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Registrar</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>