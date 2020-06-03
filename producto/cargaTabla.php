<?php
    include_once("../Utilerias/BaseDatos.php");
    $tuplas = consultaProd();
    echo "<table id='tabla' class=' highlight responsive-table' >
    <thead><tr><th>Nombre del Producto</th><th>unidad Medida</th><th>Departamento</th><th>Editar/Eliminar</th></tr></thead>
    <tbody>";
    foreach ($tuplas as $tupla) {
        $id = $tupla["idprod"];
        $nomp = $tupla["nomprod"];
        $um = $tupla["unidadmed"];
        $iddep = $tupla["iddepto"];
        $nomdep = $tupla["nomdepto"];
        echo "<tr><td>$nomp</td><td>$um</td><td>$nomdep</td><td><i class='material-icons editar hoverable' data-id='$id' data-nom='$nomp' data-um='$um' data-iddep='$iddep'>create</i>&nbsp&nbsp&nbsp&nbsp<i class='material-icons eliminar hoverable' data-id='$id'>delete_forever</i></td></tr>";
    }
    echo "</tbody>
    </table>";
?>