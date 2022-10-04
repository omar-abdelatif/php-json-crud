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
    $error = "error not found";
    if ( move_uploaded_file( $temp_name, $location ) ) {
        $Url   = 'uploads/' . $location;
        $error = 'Error Uploading File';
        return $Url;
    }
    return $error;
}
function updateImgPath($tmp_name, $path, $link){
    if(move_uploaded_file($tmp_name, $path)){
        $link = 'uploads/'.$path;
        return $link;
    }
}
function getLastId(){
    $data = json_decode(file_get_contents('../db/data.json'), true);
    if(empty($data)){
        return 1;
    }
    return $data[count($data)-1]['id']+1;
}
function removeFromDir($path, $avatar){
    unlink($path.$avatar);
    return $path;
}