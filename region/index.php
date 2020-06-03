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
<?php 
  include_once("../Utilerias/BaseDatos.php");
  $res = validaOpcion();
  if ($res == ""){
    header("location:../Acceso/");//Login
  }else{
    include_once("../resources/html/header.php");
  }

?>
<!-- Colocar su código a partir de este comentario -->
<div class="container">
  <div class="row">
    <div class="card">
      <a id="btnAgregar" class="btn-floating btn-large waves-effect waves-light right">
        <i class="material-icons">add</i>
      </a>
      <div class="card-content">
        <span><h3>Regiones</h3></span>
         <div id="tablita">
              
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="vtaModal">
    <div class="modal-content">
        <h4>CRUD Regiones</h4>
        <br>
        <form id="frm-regiones" method="POST">
            <div class="row">
              <div class="input-field col s12">
                  <input type="text" id="idr" name="idr">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                   <input type="text" id="nomr" name="nomr" class="validate" >
                   <label class="active" for="nomr">Nombre de la Región:</label>
              </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
      <a id="btnGuardar" class="modal-action waves-effect waves-light btn">
        <i class="material-icons right">check</i>
        Guardar</a>
    </div>
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
    <script type="text/javascript" src="./valida.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();
            $('.sidenav').sidenav();
            $(".dropdown-trigger").dropdown();
            M.updateTextFields();
        });
   
    </script> 
</body>
</html>