<?php
    include_once("../Utilerias/BaseDatos.php");
    $tuplas = consultaSuc();
    echo "<table id='tabla' class=' highlight responsive-table' >
    <thead><tr><th>Nombre del Sucursal</th><th>cp</th><th>Region</th><th>Editar/Eliminar</th></tr></thead>
    <tbody>";
    foreach ($tuplas as $tupla) {
        $id = $tupla["idsuc"];
        $nom = $tupla["nomsuc"];
        $cp = $tupla["cp"];
        $idr = $tupla["idreg"];
        $nomr = $tupla["nomreg"];
        echo "<tr><td>$nom</td><td>$cp</td><td>$nomr</td><td><i class='material-icons editar hoverable' data-id='$id' data-nom='$nom' data-cp='$cp' data-idr='$idr'>create</i>&nbsp&nbsp&nbsp&nbsp<i class='material-icons eliminar hoverable' data-id='$id'>delete_forever</i></td></tr>";
    }
    echo "</tbody>
    </table>";
?>