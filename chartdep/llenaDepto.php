<?php 
    include_once("../Utilerias/BaseDatos.php");
    $tuplas =  consultaDepto();
    echo "<option value= '0'>Graficar Todas los Departamento</option>";
    foreach ($tuplas as $tupla){
        $iddep = $tupla["iddepto"];
        $nomd = $tupla["nomdepto"];
        echo "<option value= '$iddep'>$nomd</option>";
    }


?>