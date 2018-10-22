<?php
    $id = $_GET["id"];
    $stmt =	Datos::deleteCarrera($id);
    header("Location: index.php?action=ListadoCarrera");
?>