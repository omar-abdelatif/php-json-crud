<?php

function requiredVal($input){
    if(empty($input)){
        return false;
    }
    return true;
}

function minVal($input, $length){
    if (strlen($input) < $length) {
        return false;
    }
    return true;
}

function maxVal($input, $length)
{
    if (strlen($input) > $length) {
        return false;
    }
    return true;
}

function emailVal($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function nameExistence($username){
    $data = file_get_contents("../db/data.json");
    $userdata = json_decode($data, true);

    foreach ($userdata as $user) {
        if ($user['username'] === $username) {
            return true;
        }else{
            return false;
        }
    }    
}

function emailExistence($email){
    $data = file_get_contents("../db/data.json");
    $emaildata = json_decode($data, true);

    foreach ($emaildata as $mail) {
        if ($mail['email'] === $email) {
            return true;
        }else{
            return false;
        }
    }
}