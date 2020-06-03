<?php 
    if  (!isset($_SESSION)){
      session_start();
      $corr = "";
    }
    $corr = isset($_SESSION["correo"])?$_SESSION["correo"]:"";
    $idSess = session_id();
?>
<header>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
      <li><a href="../region/">Regiones</a></li>
      <li><a href="../depto/">Departamentos</a></li>
      <li><a href="../sucursal/">Sucursales</a></li>
      <li><a href="../Reportes/">Reportes</a></li>
  <li class="divider"></li>
      <li><a href="../producto/">Productos</a></li>
</ul>
<nav class="indigo darken-4">
  <div class="nav-wrapper">
    <a href="../Home/" class="brand-logo">Logo</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="../region/">Regiones</a></li>
      <li><a href="../depto/">Departamentos</a></li>
      <li><a href="../producto/">Productos</a></li>
      <li><a href="../sucursal/">Sucursales</a></li>
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Catalogos<i class="material-icons right">arrow_drop_down</i></a></li>
      <?php
          if ($corr == "")
             echo "<li><a href='../Acceso/''>Iniciar sesión</a></li>";
          else
             echo "<li><a href='../Acceso/destruir.php''>$corr(Cerrar)</a></li>";
      ?>
    </ul>
  </div>
</nav>

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="../Imagenes/office.jpg">
      </div>
      <a href="#user"><img class="circle" src="../Imagenes/Tecnm.png"></a>
      <a href="#name"><span class="black-text name">Alex Lora</span></a>
      <a href="#email"><span class="black-text email">alguzman@itroque.edu.mx</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Sistemas y Computación</a></li>
    <li><a href="sass.html">Sass</a></li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        
</header>

