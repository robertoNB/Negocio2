<?php
    include_once("../Utilerias/BaseDatos.php");
    $post = $_POST;
    if (!isset($_SESSION)){
        session_start();
    }

    //trae el identificador de la sesion
    $idses = session_id();
    //------------Validar el contenido del las cajas de texto

    //--------------------------------------------------------
   // var_dump($post);
    //die("AAAA");
    $result = validaUser($post,$idses);
    if ($result){
        $_SESSION["correo"]= $post['corr'];
       $response['status'] = true;
       $response['data'] = $post;
    }
    else{
        $response['status'] = false;
        $response['data'] = $post;
    }
    echo json_encode($response);
?>