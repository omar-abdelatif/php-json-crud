<?php
session_start();
if(!isset($_SESSION['auth'])){ header('location: ../dashboard.php'); }
include '../core/functions.php';
include '../core/validations.php';
$errors = [];
if ( isset( $_POST[ 'username' ] ) || isset( $_POST[ 'email' ] ) || isset( $_POST[ 'password' ] ) ) {
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
    if ( !requiredVal( $email ) ) {
        $errors[] = 'Email is required';
    } elseif ( !emailVal( $email ) ) {
        $errors[] = 'Plz Insert Valid Email';
    }
    if ( !requiredVal( $password ) ) {
        $errors[] = 'Password is required';
    } elseif ( !minVal( $password, 8 ) ) {
        $errors[] = 'Password must be at least 8 characters';
    } elseif ( !maxVal( $password, 20 ) ) {
        $errors[] = 'Password must be less than 20 characters';
    }
    if ( nameExistence( $username ) ) {
        $errors[] = 'Username already exists';
    }
    if ( emailExistence( $email ) ) {
        $errors[] = 'Email already exists';
    }
    if ( empty( $errors ) ) {
        $array_data = json_decode( file_get_contents( '../db/data.json' ), true );
        $avatar = implode( '', $_FILES[ 'avatar' ][ 'name' ]);
        $temp_name = implode( '', $_FILES[ 'avatar' ][ 'tmp_name' ]);
        $dir = '../uploads/';
        $location = $dir . $avatar;
        $ImgUrl = move_file( $temp_name, $location, $Url );
        $id = getLastId();
        $extra = [
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'avatar' => $avatar,
            'image' => $ImgUrl
        ];
        $array_data[] = $extra;
        $final_data = json_encode( $array_data, JSON_PRETTY_PRINT );
        if ( file_put_contents( '../db/data.json', $final_data ) ) {
            $_SESSION[ 'success' ] = 'You have registered successfully';
                redirect('../profile.php');
            // if(){
            //     redirect( '../dashboard.php' );
            // } else {
            //     redirect('../profile.php');
            // }
        } else {
            $_SESSION[ 'errors' ] = 'Something went wrong';
            redirect( '../signup.php' );
        }
        $_SESSION[ 'auth' ] = [$id, $username, $email ];
    } else{
        $_SESSION[ 'errors' ] = $errors;
        redirect( '../signup.php' );
    }
} else{
    $errors[] = "<h1 class='error'>No User With This Data</h1>";
}
