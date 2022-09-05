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