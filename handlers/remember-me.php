<?php

// remember-me handler

include "../core/functions.php";

$errors = [];

if (isset($_POST['username']) || isset($_POST['password'])) {

    foreach ($_POST as $key => $value) {
        $$key = sanitizeInput($value);
    }

    if (!requiredVal($username)) {
        $errors[] = "Username is required";
    } elseif (!minVal($username, 3)) {
        $errors[] = "Username must be at least 3 characters";
    } elseif (!maxVal($username, 20)) {
        $errors[] = "Username must be less than 20 characters";
    }

    if (!requiredVal($password)) {
        $errors[] = "Password is required";
    } elseif (!minVal($password, 8)) {
        $errors[] = "Password must be at least 8 characters";
    } elseif (!maxVal($password, 20)) {
        $errors[] = "Password must be less than 20 characters";
    }

    if (empty($errors)) {
        if (file_exists("../db/data.json")) {
            $current_data = file_get_contents("../db/data.json");
            $array_data = json_decode($current_data, true);
            foreach ($array_data as $user) {
                if ($user['username'] == $username && $user['password'] == $password) {
                    $_SESSION['auth'] = [$username, $user['email']];
                    if (isset($_POST['remember-me'])) {
                        setcookie("username", $username, time() + 60 * 60 * 24 * 30);
                        setcookie("password", $password, time() + 60 * 60 * 24 * 30);
                    }
                    redirect("../index.php");
                    die();
                }
            }
            $_SESSION['errors'] = ["Username or Password is incorrect"];
            redirect("../signin.php");
        }
    } else {
        $_SESSION['errors'] = $errors;
        redirect("../signin.php");
    }
}

