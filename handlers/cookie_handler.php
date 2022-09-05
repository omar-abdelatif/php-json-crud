<?php

// Set Auth Cookies if 'Remember Me' checked

if (isset($_POST['remember-me']) && $_POST['remember-me'] == '1') {

    $hour = time() + 3600 * 24 * 30 * 12;

    setcookie('username', $username, $hour);

    setcookie('password', $password, $hour);

}
