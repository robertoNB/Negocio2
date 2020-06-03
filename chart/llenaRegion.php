<?php 
    include_once("../Utilerias/BaseDatos.php");
    $tuplas = consultaRegion();
    echo "<option value= '0'>Graficar Todas las Regiones</option>";
    foreach ($tuplas as $tupla){
        $idreg = $tupla["idreg"];
        $nomr = $tupla["nomreg"];
        echo "<option value= '$idreg'>$nomr</option>";
    }


?>