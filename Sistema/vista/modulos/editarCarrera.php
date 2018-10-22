<?php
if(isset($_GET["id"]))
{
    $id =$_GET["id"];
    $stmt =	Datos::getCarreraID($id);
}

?>

<div class="col-md-12">
    <div align="center">
        <h1>Editar Carrera</h1>
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-primary">
                <div class="box-header with-border">
                <h3 class="box-title">Ingrese los datos</h3>
                </div>
                <form method="POST" action="index.php?action=editarCarrera&id2=<?=$id?>">
                <div class="box-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de la carrera</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="nombre" value="<?php if(isset($stmt["nombre"])){echo $stmt["nombre"];}?>">
                    </div>
                    <label for="texto">Descripcion de la carrera</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="texto" name="texto"></textarea>
                    </div>
                    <div class="checkbox">
                    
                    </div>
                    <button type="submit" class="btn btn-primary" >Editar Carrera</button><br><br>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    //Enviar los datos al controlador mcvcontroler (es la clase principal de controller.php)
    $registro = new MvcControlador();

    //se invoca la funcion registrousuariocontroller de la clase mvccontroller;
    $resputaldo = $registro -> EditarCarrera();
    
?>