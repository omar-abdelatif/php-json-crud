<?php

// forgot_password handler without sqli

include "includes/header.php";

// include "includes/nav.php";

?>

<div class="form mx-auto mt-5 text-center">
    <div class="title">
        <h3 class="border p-3 w-50 mx-auto">Reset Password</h3>
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

    <?php
    if (isset($_SESSION['success'])) :
        foreach ($_SESSION['success'] as $success) : ?>
            <div class="mt-5 w-50 mx-auto alert alert-success text-center">
                <?php echo "Password Changed Successfully" ?>
            </div>
            ?>

    <?php
            unset($_SESSION['success']);
        endforeach;
    endif;
    ?>


    <form action="handlers/handle_forgot_password.php" method="post" class="mt-4 d-flex flex-wrap w-100 flex-column justify-content-center">
        <div class="mb-4 w-100">
            <label for="exampleInputEmail1" class="form-label">New Password</label>
            <input type="password" name="pass" class="form-control w-50 mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your New Password Plz">
        </div>
        <div class="mb-1 w-100">
            <label for="exampleInputEmail1" class="form-label">Confirm New Password</label>
            <input type="password" name="cnfm_pass" class="form-control w-50 mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm Your New Password Plz">
        </div>
        <div class="d-flex justify-content-center mt-4 mb-4">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>