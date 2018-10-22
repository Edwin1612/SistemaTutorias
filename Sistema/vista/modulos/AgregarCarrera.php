<?php
$registro = new MvcControlador();

//se invoca la funcion registrousuariocontroller de la clase mvccontroller;
$resultado= $registro -> AddCarrera();

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
        <h1>Agregar Carrera</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Ingrese los datos</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="POST">
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de la carrera</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nombre" name="nombre" required>
                    </div>
                    <label for="texto">Descripcion de la carrera</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="texto" name="texto"></textarea>
                    </div>
                    <div class="checkbox">
                    
                    </div>
                    <button type="submit" class="btn btn-primary" >Agregar Carrera</button><br><br>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>