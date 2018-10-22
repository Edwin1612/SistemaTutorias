<?php
    $id = $_GET["id"];
    $stmt =	Datos::deleteAlumno($id);
    header("Location: index.php?action=ListadoAlumno");
?>