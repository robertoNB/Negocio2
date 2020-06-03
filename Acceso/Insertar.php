<?php
    include_once("../Utilerias/BaseDatos.php");
    $post = $_POST;
    //------------Validar el contenido del las cajas de texto
    $post['corru'] = val_input(isset($post['corru'])?$post['corru']:"");
    $post['nomu'] = val_input(isset($post['nomu'])?$post['nomu']:"");
    $post['contu'] = val_input(isset($post['contu'])?$post['contu']:"");
    //--------------------------------------------------------
   // var_dump($post);
    //die("AAAA");
    $result = InsertarUsr($post);
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