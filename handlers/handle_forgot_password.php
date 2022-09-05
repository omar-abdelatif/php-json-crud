<?php

include '../core/functions.php';

include '../core/validations.php';

$errors = [];

if ( isset( $_POST[ 'submit' ] ) ) {
    if ( empty( $errors ) ) {
        if ( file_exists( '../db/data.json' ) ) {
            $data = file_get_contents( '../db/data.json' );
            $data = json_decode( $data, true );
            $data = $data[ 'users' ];
            if( isset( $_POST[ 'pass' ] ) && isset( $_POST[ 'cnfm_pass' ] ) ) {
                if ( $_POST[ 'pass' ] == $_POST[ 'cnfm_pass' ] ) {
                    $data[ $_SESSION[ 'user' ] ][ 'pass' ] = $_POST[ 'pass' ];
                    $data = json_encode( $data, JSON_PRETTY_PRINT );
                    file_put_contents( '../db/data.json', $data );
                    $_SESSION[ 'success' ] = [ 'Password Changed Successfully' ];
                    header( 'Location: ../index.php' );
                } else {
                    $_SESSION[ 'errors' ] = [ 'Password Does Not Match' ];
                    header( 'Location: ../forgot_password.php' );
                }
            }
        }
    }
}