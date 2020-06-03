<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantilla Home</title>
    <!-- Importa librerias de estilos de Materialize, DataTable e Iconos -->
    <link type="text/css" rel="stylesheet" href="./css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="./css/dataTables.materialize.css"/>
    <link type="text/css" rel="stylesheet" href="./css/default.css"/>
    <link rel="icon" type="image/x-icon" href="./fonts/favicon.ico" />
</head>
<body>
<!-- La siguiente linea importa un programa de php el cual incluye un menu 
  de tipo NavBar de Materialize y corresponde al Header de la página-->
<?php include_once("./resources/html/header.php"); ?>

<!-- Colocar su código a partir de este comentario -->
<div class="container">
    <div class="row">
        <div class="col s12 blue">12</div>
    </div>
    <div class="row">
        <div class="col s4 m3 yellow">6</div>
        <div class="col s8 m9 blue">6</div>
    </div>
    <div class="row">
        <div class="col s3 m10 pink">s3</div>
        <div class="col s6 m1 green">s6</div>
        <div class="col s3 m1 red">s3</div>
    </div>
    
</div>
<div class="container">
    <div class="row"></div>
</div>
<!-- La siguiente linea incluye el footer de nuestra página web -->
<?php include_once("./resources/html/footer.php"); ?>

<!-- Importa librerias de JavaScript de Jquery, Jaquery Validate, DataTable
     y Materialize                                                       -->
<script type="text/javascript" src="./js/jquery-3.0.0.min.js"></script>
    <script type="text/javascript" src="./js/materialize.min.js"></script>
    <script type="text/javascript" src="./js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./js/dataTables.materialize.js"></script>
    <script type="text/javascript" src="./js/jquery.validate.min.js"></script>     
    <script type="text/javascript">
     $(document).ready(function(){
        $('select').formSelect();
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown();
     });
   
    </script> 
</body>
</html>