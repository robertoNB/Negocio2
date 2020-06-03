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
    <div class="row">
        <div class="col s12 m8 offset-m2">
          <div class="card">
            <div class="card-content">
              <span class="card-title">Control de acceso</span>
              <br>
              <form id="frm" name="frm"  method="post">
                <div class="row">
                  <div class="input-field col s12">
                    <input type="text" name="corr" id="corr" class="validate">
                    <label for="corr">Correo electronico</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input type="password" name="cont" id="cont" class="validate">
                    <label for="cont">Contraseña:</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 center-align">
                  <a id="btnEntrar" class=" waves-effect waves-light btn">
                    <i class="material-icons right">check</i> Entrar</a>
                    <a id="btnRegistrar" class="modal-action waves-effect waves-light btn">
                    <i class="material-icons right">check</i> Registrar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
<!-- modal -->
<div class="modal" id="vtaModal">
    <div class="modal-content">
        <h4>Registro Usuario</h4>
        <br>
        <form id="frm-registro" method="POST">
            <div class="row">
              <div class="input-field col s12">
                  <input type="text" id="corru" calss="validate" name="corru">
                  <label class="active" for="corru">Correo :</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                   <input type="text" id="nomu" name="nomu" class="validate" >
                   <label class="active" for="nomu">Nombre :</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                   <input type="text" id="contu" name="contu" class="validate" >
                   <label class="active" for="contu">Contraseña:</label>
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
     });
   
    </script> 
</body>
</html>