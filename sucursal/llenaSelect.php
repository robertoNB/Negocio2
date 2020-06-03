<?php
include_once("../Utilerias/BaseDatos.php");
$tuplas = consultaSuc();

foreach ($tuplas as $tupla) {
    $id = $tupla["idsuc"];
    $nom = $tupla["nomsuc"];
    echo "<option value='$id'>$nom</option>";
}


?>