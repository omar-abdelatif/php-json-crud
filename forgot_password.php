<?php

// session_start();

// forgot_password handler without sqli

include "includes/header.php";

// include "includes/nav.php";

?>

<div class="form mx-auto mt-5 text-center">
    <div class="title">
        <h3 class="border p-3 w-50 mx-auto">Forgot Password</h3>
    </div>
    <?php
    if (isset($_SESSION['errors'])) :
        foreach ($_SESSION['errors'] as $error) : ?>
            <div class="mt-5 w-50 mx-auto alert alert-danger text-center">
                <?php echo $error; ?>
            </div>
    <?php
        endforeach;
    endif;
    unset($_SESSION['errors']);
    ?>

    <form action="handlers/handle_update.php" method="post" class="mt-4 d-flex flex-wrap w-100 flex-column justify-content-center">
        <div class="mb-4 w-100">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control w-50 mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Plz">
        </div>
        <div class="d-flex justify-content-center mt-4 mb-4">
            <input type="submit" class="btn btn-primary" value="Send">
        </div>
    </form>