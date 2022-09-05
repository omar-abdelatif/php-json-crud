<?php

include "includes/header.php";

include "includes/nav.php";

?>

<div class="form mx-auto mt-5 text-center">
    <div class="title">
        <h3 class="border p-3 w-50 mx-auto">Sign Up</h3>
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
    if (!empty($_SESSION['success'])) : ?>
        <div class="mt-5 w-50 mx-auto alert alert-success text-center">
            <?php echo $_SESSION['success']; ?>
        </div>
    <?php
    endif;
    unset($_SESSION['success']);
    ?>
    <form action="handlers/handle_signup.php" method="post" class="mt-4 d-flex flex-wrap w-100 flex-column justify-content-center" enctype="multipart/form-data">
        <div class="mb-4 w-100">
            <label for="exampleInputName1" class="form-label">UserName</label>
            <input type="text" name="username" class="form-control w-50 mx-auto" id="exampleInputName1" placeholder="Your UserName Plz">
        </div>
        <div class="mb-4 w-100">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" name="email" class="form-control w-50 mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Plz">
        </div>
        <div class="mb-4 w-100">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control w-50 mx-auto" id="exampleInputPassword1" placeholder="Your Password Plz">
        </div>
        <div class="profile-img w-100">
            <label for="avatar" class="form-label">Upload Profile Image</label>
            <input type="file" name="avatar[]" class="form-control w-50 mx-auto" id="avatar">
        </div>
        <div class="account">
            <p class="mt-3 p-0 d-flex align-items-center justify-content-center">Already have an account?
                <a href="signin.php" class="btn ml-1 text-white p-0 m-0" style="text-decoration: underline;">Login</a>
            </p>
        </div>
        <div class="d-flex justify-content-center mt-4 mb-4">
            <input type="submit" name="submit" class="btn btn-primary" value="Signup">
            <input type="reset" class="btn btn-danger" value="Reset">
        </div>
    </form>
</div>

<?php include "includes/footer.php"; ?>