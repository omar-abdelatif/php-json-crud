<?php

include "../core/functions.php";

if (null !== $_REQUEST['user_id']) {

    $id = $_REQUEST['user_id'];

    $data = json_decode(file_get_contents('../db/data.json'));

    foreach ($data as $i => $db) {
        if($db->id == $id){
            unset($data[$i]);
            $save = json_encode(array_values($data), JSON_PRETTY_PRINT);
            file_put_contents('../db/data.json', $save);
            break;
        }
    }
    header('Location: ../dashboard.php');

} else {
    redirect('../error.php');
}