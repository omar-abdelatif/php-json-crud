<?php
if(!isset($_SESSION['auth'])) {
    header("Location: ../signout.php");
}
include "../core/functions.php";
if (isset($_POST['username']) && isset($_GET['user_id'])) {
    $id = $_GET['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = implode($_FILES['avatar']['name']);
    $tmp_name = implode($_FILES['avatar']['tmp_name']);
    $link = '../uploads/';
    $path = $link.$avatar;
    $updateImgPath = updateImgPath($tmp_name, $path, $link);
    $data = json_decode(file_get_contents('../db/data.json'), true);
    $i=1;
    foreach($data as $i => $user){
        if($user['id'] == $id){
            $data[$i]['username'] = $username;
            $data[$i]['email'] = $email;
            $data[$i]['password'] = $password;
            $data[$i]['avatar'] = $avatar;
            $data[$i]['image'] = $updateImgPath;
        }
        $save = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents('../db/data.json', $save);
        $i++;
    }
    header('Location: ../dashboard.php');
} else {
    header('location: ../error.php');
}