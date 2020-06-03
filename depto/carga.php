<?php
  include_once("../Utilerias/BaseDatos.php");
  $tuplas = consultaDepto();
 
  foreach ($tuplas as $tupla) {
      $id = $tupla["iddepto"];
      $nom = $tupla["nomdepto"];
      echo "<tr><td>$nom</td><td><i  class='material-icons editar'>create</i>&nbsp<i  class= 'material-icons eliminar' >delete_forever <i></i></td></tr>";


  }


  ?>