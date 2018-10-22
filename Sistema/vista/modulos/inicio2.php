<?php
    $stmt = Datos::MisTutorados();
    $stmt2 = Datos::SessionesActivas();

    $stmt3 = Datos::SessionesFinalizadaid($_SESSION["idUsuario"]);
    $stmt4 = Datos::countCarreras();
?>


<section class="content-header">
      <h1>
        Inicio
        <small>Sistema de tutorias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Principal</li>
      </ol>
    </section>

    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row col-md-10 col-md-offset-1">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$stmt["count(*)"]?></h3>

              <p>Tutorados</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?action=ListadoCarrera" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$stmt2["count(*)"]?></h3>

              <p>Sesiones activas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="index.php?action=ListadoTutor" class="small-box-footer">Mas informacion <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        </div>

              <div class="row col-md-10 col-md-offset-3">
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?=$stmt3["count(*)"]?></h3>

              <p>Sesiones Finalizadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="index.php?action=ListadoCarrera" class="small-box-footer">Mas informacion<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </section>