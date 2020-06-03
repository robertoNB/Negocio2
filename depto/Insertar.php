<?php
    include_once("../Utilerias/BaseDatos.php");
    $post = $_POST;
    //------------Validar el contenido del las cajas de texto

    //--------------------------------------------------------
   // var_dump($post);
    //die("AAAA");
    $result = InsertarDepto($post);
    if ($result){
       $response['status'] = true;
       $response['data'] = $post;
    }
    else{
        $response['status'] = false;
        $response['data'] = $post;
    }
    echo json_encode($response);
?>