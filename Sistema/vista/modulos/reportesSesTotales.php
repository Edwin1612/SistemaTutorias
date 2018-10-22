<?php
    $stmt =	Datos::getReporteSesionesHijosTotales($_SESSION["idUsuario"]);
?>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de reportes de sesion</h3>
            </div>
           
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rango de filas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
          <td align="center"><b>Fecha</b></th>
          <td align="center"><b>Alumno</b></th>
          <td align="center"><b>Notacion</b></th>
        </tr>
                </thead>
                <tbody>
                <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
              //Se hace un array asociativo para poder sacar los valores
                  {?>
                  <tr>
                <td align="center"><?= $datos['fecha'] ?></td>
                <?php
                    $stmt2 =	Datos::getAlumnoID($datos['idAlumno']);
                ?>
                <td align="center"><?= $stmt2["nombre"] ?></td>
                <td align="center"><?= $datos["notacion"] ?>
                </td>
                
                
            </tr>
                <?php }?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>