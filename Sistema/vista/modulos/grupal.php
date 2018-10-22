<<?php
    $stmt= Datos::GetMisTutorados(); 
    $registro = new MvcControlador();

    /*if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $checkbox) {
            echo $checkbox."<br>";
         }
    }*/
    $resultado= $registro -> AddSesionGrupal();
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

                    <div class="col-sm-12">
                        <div class="form-group">
                        <textarea class="form-control" rows="20" placeholder="Enter ..." name="notacion"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                    <label for="">Alumnos</label><br>
                    <div>
                    <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
                    //Se hace un array asociativo para poder sacar los valores
                        {?>
                        <label for=""><?=$datos["nombre"]?></label>
                        <input type="checkbox" name="check_list[]" value="<?=$datos["idAlumno"]?>">
                        <?php }?>
                    </div>
                    </div>

                    
                </div><br><br>
                <div class="col-md-12" align="center">
                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Registrar</button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>