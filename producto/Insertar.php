<?php
    include_once("../Utilerias/BaseDatos.php");
    $post = $_POST;
    //------------Validar el contenido del las cajas de texto

    //--------------------------------------------------------
   // var_dump($post);
    //die("AAAA");
    $result = InsertarProd($post);
    if ($result){
       $response['status'] = 1;
       $response['data'] = $post;
    }
    else{
        $response['status'] = 0;
        $response['data'] = $post;
    }
    echo json_encode($response);
?>