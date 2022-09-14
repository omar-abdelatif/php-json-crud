<?php

if(isset($_POST['submit'])){
    $data = file_get_contents('../db/data.json');
    $data_decoded = json_decode($data, true);
    $keys = array_keys($data_decoded);
    
    foreach ($keys as $key) {
        if($data_decoded[$key]['id'] == '6320b92650eaa'){
            $data_decoded[$key]["username"] = $_POST['edited_name'];
        }
    }
    $viewchange = json_encode($data_decoded, JSON_PRETTY_PRINT);
    file_put_contents('../db/data.json', $viewchange);
    header('location: ../dashboard.php');
}




