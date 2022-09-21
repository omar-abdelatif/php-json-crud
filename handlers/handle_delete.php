<?php

if(!isset($_SESSION['auth'])) {
    header("Location: signin.php");
}

include '../core/functions.php';

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $data = json_decode(file_get_contents('../db/data.json'), true);

    echo $id;

    // $i=1;
    // foreach ($data as $i => $db) {
    //     if($db->id == $id){
    //         unset($data[$i]);
    //     }
    //     $save = json_encode($data, JSON_PRETTY_PRINT);
    //     file_put_contents('../db/data.json', $save);
    //     break;
    // $i++;
    // }

    // foreach($data as $element){
    //     if($element->id == $id){
    //         unset($data[$i]);
    //     }
    //     $save = json_encode($data, JSON_PRETTY_PRINT);
    //     file_put_contents('../db/data.json', $save);
    // }





























    header('Location: ../dashboard.php');

} else {
    redirect('../error.php');
}