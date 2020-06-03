<?php
    include_once("../Utilerias/BaseDatos.php");
    $tuplas = consultaDepto();
    echo "<table id='tabla' class=' highlight responsive-table' >
    <thead><tr><th>Nombre del Departamento</th><th>Editar/Eliminar</th></tr></thead>
    <tbody>";
    foreach ($tuplas as $tupla) {
        $id = $tupla["iddepto"];
        $nom = $tupla["nomdepto"];
        echo "<tr><td>$nom</td><td><i class='material-icons editar hoverable' data-id='$id' data-nom='$nom'>create</i>&nbsp&nbsp&nbsp&nbsp<i class='material-icons eliminar hoverable' data-id='$id'>delete_forever</i></td></tr>";
    }
    echo "</tbody>
    </table>";
?>