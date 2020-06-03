<?php
include_once("../Utilerias/BaseDatos.php");
$tuplas = consultaProd();

foreach ($tuplas as $tupla) {
    $id = $tupla["iddepto"];
    $nom = $tupla["nomdepto"];
    echo "<option value='$id'>$nom</option>";
}
?>