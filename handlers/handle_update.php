<?php

session_start();

include "../core/functions.php";

if(!isset($_SESSION['auth'])) {
    header("Location: signin.php");
}

if (isset($_POST['submit'])) {
    $name = $_POST['edited_name'];
    $password = $_POST['edited_password'];
    $email = $_POST['edited_email'];
    // $img = $_FILES['avatar'];
    // $id = $_REQUEST['user_id'];
    $data = json_decode(file_get_contents('../db/data.json'), true);
    foreach ($data as $db) {
    if ($db['username'] == $name) {
        $db['password'] = $password;
        $db['email'] = $email;
    }
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('../db/data.json', $json);
};
    redirect('../dashboard.php');
} else {
    redirect('../error.php');
}

