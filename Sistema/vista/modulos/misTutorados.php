<?php
    $stmt =	Datos::GetMisTutorados();
?>

<div class="container">
    <div class="col-md-10">
        <div class="header">
            <h1 align="center">Mis Tutorados</h1>
        </div>
    </div>

    
    <div class="col-md-10">
    <?php while($datos = $stmt->fetch(PDO::FETCH_ASSOC))
//Se hace un array asociativo para poder sacar los valores
    {?>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?=$datos["foto"]?>" alt="User profile picture" width="100" height="100">

                <h3 class="profile-username text-center"><?=$datos["nombre"]?></h3>
                <?php
                    $stmt2 =	Datos::getCarreraID($datos["idCarrera"]);
                ?>

                <p class="text-muted text-center"><?=$stmt2["nombre"]?></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                    
                    <?php
                        $stmt2 =	Datos::countAlumnoSesiones($datos["idAlumno"]);
                    ?>
                    <?php
                        $stmt3 =	Datos::countAlumnoReportes($datos["idAlumno"]);
                    ?>
                    <b>Asesorias</b> <a class="pull-right"><?=$stmt2["count(*)"]?></a>
                    </li>
                    <li class="list-group-item">
                    <b>Sesiones</b> <a class="pull-right"><?=$stmt3["count(*)"]?></a>
                    </li>
                </ul>

                
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    <?php }?>
        
    </div>
    
    
</div>