<?php

function checkRequestMethod( $method ) {
    if ( $_SERVER[ 'REQUEST_METHOD' ] == $method ) {
        return true;
    }
    return false;
}

function checkPostInput( $input ) {
    if ( isset( $_POST[ $input ] ) ) {
        return true;
    }
    return false;
}

function sanitizeInput( $input ) {
    return trim( htmlspecialchars( htmlentities( $input ) ) );
}

function checkPassword( $password ) {
    if ( strlen( $password ) > 8 ) {
        return true;
    }
    return false;
}

function redirect( $path ) {
    header( "Location: $path" );
}

function move_file( $temp_name, $location, $Url ) {
    $error = "error not fount";
    if ( move_uploaded_file( $temp_name, $location ) ) {
        $Url   = 'uploads/' . $location;
        $error = 'Error Uploading File';
        return $Url;
    }
    return $error;
}

function createId() {
    $unique = uniqid();
    return $unique;
}

function getUsers(){
    return json_decode(file_get_contents(__DIR__ . '/data.json'), true);
}

function getUserById($id){
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

function updateUser($data, $id){
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = $updateUser = array_merge($user, $data);
        }
    }

    putJson($users);

    return $updateUser;
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}