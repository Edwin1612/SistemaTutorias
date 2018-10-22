<?php
    $stmt =	Datos::getDepartamento();
?>
<h1 align="center">SISTEMA TUTORIAS</h1>
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Listado de Administradores</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table">
        <tbody><tr>
          <td align="center"><b>Nombre</b></th>
          <td align="center"><b>Correo</b></th>
          <td align="center"><b>Contraseña</b></th>
          <td align="center" style="width:40px"><b>Editar</b></th>
          <td align="center" style="width:40px"><b>Borrar</b></th>
        </tr>
        <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
    //Se hace un array asociativo para poder sacar los valores
        {?>
            
            <tr>
                <td align="center"><?= $datos['nombre'] ?></td>
                <td align="center"><?= $datos["correo"] ?></td>
                <td align="center"><?= $datos["contrasena"] ?></td>
                <td align="center"><a href="index.php?action=editarDepartamento&id=<?= $datos["idUsuario"] ?>">
                <button type="button" class="btn btn-warning">Editar</button>
                </a></td>
                <td align="center"><a href="index.php?action=eliminarDepartamento&id=<?= $datos['idUsuario'] ?>">
                <button type="button" class="btn btn-danger">Borrar</button>
                </a></td>
            </tr>
        <?php }?>
      </tbody></table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>