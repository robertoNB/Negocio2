<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla Home</title>
    <!-- Importa librerias de estilos de Materialize, DataTable e Iconos -->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../css/dataTables.materialize.css"/>
    <link type="text/css" rel="stylesheet" href="../css/default.css"/>
    <link rel="icon" type="image/x-icon" href="../fonts/favicon.ico" />
</head>
<body>
<!-- La siguiente linea importa un programa de php el cual incluye un menu 
  de tipo NavBar de Materialize y corresponde al Header de la página-->
<?php include_once("../resources/html/header.php"); ?>

<div class="container">
<form id="frm1" name="frm1" method="POST" action="Grafica.php">
  
  <div class="row">
    <div class="input-field col s6">
        <select name="idTG" id="idTG">
          <option value="line">Linea</option>
          <option value="bar">barras</option>
        </select>
         <label for="idTG">Tipo de grafica</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <select name="idreg" id="idreg">
        <?php include_once("./llenaRegion.php");?>
      </select>
        <label for="idreg">Regiones</label>
    </div>
  </div>
  <div class="row">
    <button class="btn waves-effect waves-light" type="submit" name="action">Graficas
      <i class="material-icons right">send</i>
    </button>
  </div>
</form>
</div>

<!-- La siguiente linea incluye el footer de nuestra página web -->
<?php include_once("../resources/html/footer.php"); ?>

<!-- Importa librerias de JavaScript de Jquery, Jaquery Validate, DataTable
     y Materialize                                                       -->
<script type="text/javascript" src="../js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="../js/materialize.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.materialize.js"></script>
    <script type="text/javascript" src="../js/jquery.validate.min.js"></script>     
    <script type="text/javascript">
     $(document).ready(function(){
        $('select').formSelect();
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown();
     });
   
    </script> 
</body>
</html>