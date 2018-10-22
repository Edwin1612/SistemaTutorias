<?php 
    $idUsuario=$_GET["id"];
    $idSesion=$_GET["idSes"];
    $registro = new MvcControlador();
    $resultado= $registro -> addSegGrupal();
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
                <h3 align="center">Reporte</h3>
                <div class="form-group">
                    <div class="col-sm-10 col-md-offset-1">
                        <div class="form-group">
                        <textarea class="form-control" rows="20" placeholder="Enter ..." name="notacion"></textarea>
                        </div>
                    </div>
                </div>
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