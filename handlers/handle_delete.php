<?php

if(!isset($_SESSION['auth'])) {
    header("Location: signin.php");
}

include '../core/functions.php';

if ( null !== $_REQUEST['user_id']) {
    $id = $_REQUEST['user_id'];
    $data = json_decode(file_get_contents('../db/data.json'), true);
    $i=1;
    foreach ($data as $i => $db) {
        if($db['id'] == $id){
            unset($data[$i]);
        }
        $save = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('../db/data.json', $save);
    $i++;
    }
    header('Location: ../dashboard.php');
}