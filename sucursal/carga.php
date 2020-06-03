<?php
  include_once("../Utilerias/BaseDatos.php");
  $tuplas = consultaSuc();
 
  foreach ($tuplas as $tupla) {
      $id = $tupla["idsuc"];
      $nom = $tupla["nomsuc"];
      echo "<tr><td>$nom</td><td><i  class='material-icons editar'>create</i>&nbsp<i  class= 'material-icons eliminar' >delete_forever <i></i></td></tr>";


  }


  ?>