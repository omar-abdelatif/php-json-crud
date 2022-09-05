<?php

session_start();

include '../core/functions.php';

include '../core/validations.php';

// include 'remember_me.php';

$errors = [];

if ( isset( $_POST[ 'username' ] ) || isset( $_POST[ 'password' ] ) ) {

    foreach ( $_POST as $key => $value ) {
        $$key = sanitizeInput( $value );
    }

    if ( !requiredVal( $username ) ) {
        $errors[] = 'Username is required';
    } elseif ( !minVal( $username, 3 ) ) {
        $errors[] = 'Username must be at least 3 characters';
    } elseif ( !maxVal( $username, 20 ) ) {
        $errors[] = 'Username must be less than 20 characters';
    }

    if ( !requiredVal( $password ) ) {
        $errors[] = 'Password is required';
    } elseif ( !minVal( $password, 8 ) ) {
        $errors[] = 'Password must be at least 8 characters';
    } elseif ( !maxVal( $password, 20 ) ) {
        $errors[] = 'Password must be less than 20 characters';
    }

    if ( empty( $errors ) ) {
        if ( file_exists( '../db/data.json' ) ) {
            $adminName = "omar";
            $current_data = file_get_contents( '../db/data.json' );
            $array_data = json_decode( $current_data, true );
            foreach ( $array_data as $user ) {
                if ( $user[ 'username' ] == $username && $user[ 'password' ] == $password ) {
                    $_SESSION[ 'auth' ] = [ $username, $user[ 'email' ] ];
                    redirect( '../index.php' );
                }
            }

            if ( $_POST[ 'username' ] == $username && $_POST[ 'password' ] !== $password ) {
                $_SESSION[ 'errors' ] == [ "Password doesn't match" ];
                redirect( '../signin.php' );
            } 
            
            if( $_POST[ 'username' ] !== $username && $_POST[ 'password' ] == $password ) {
                $_SESSION[ 'errors' ] == [ "Username doesn't match" ];
                redirect( '../signin.php' );
            }

            if( $_POST[ 'username' ] !== $username && $_POST[ 'password' ] !== $password ) {
                $_SESSION[ 'errors' ] == [ "This Account Doesn't Exist" ];
                redirect( '../signup.php' );
            }

        } else {
            $_SESSION[ 'errors' ] = [ "Username doesn't exist" ];
            $_SESSION[ 'errors' ] = $errors;
            redirect( '../signin.php' );
        }
    } else {
        $_SESSION[ 'errors' ] = $errors;
        redirect( '../signin.php' );
    }

}