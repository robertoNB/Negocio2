<?php
  include_once("../Utilerias/BaseDatos.php");
  $tuplas = consultaProd();
 
  foreach ($tuplas as $tupla) {
      $id = $tupla["idprod"];
      $nom = $tupla["nomprod"];
      echo "<tr><td>$nom</td><td><i  class='material-icons editar'>create
      </i>&nbsp<i  class= 'material-icons eliminar' >delete_forever <i></i></td></tr>";
  }
  ?>