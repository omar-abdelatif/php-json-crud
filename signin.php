<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>


<div class="form mx-auto mt-5 text-center">
    <div class="title">
        <h3 class="border p-3 w-50 mx-auto">Sign In</h3>
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
    <form action="handlers/handle_login.php" method="post" class="mt-4 d-flex flex-wrap w-100 flex-column justify-content-center">
        <div class="mb-4 w-100">
            <label for="exampleInputName1" class="form-label">UserName</label>
            <input type="text" name="username" class="form-control w-50 mx-auto" id="exampleInputName1" placeholder="Your UserName Plz">
        </div>
        <div class="mb-4 w-100">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control w-50 mx-auto" id="exampleInputPassword1" placeholder="Your Password Plz">
        </div>
        <div class="d-flex justify-content-between align-items-center w-50 mx-auto">
            <div class="remember-me">
                <input type="checkbox" class="m-0" name="remember-me" id="remember-me">
                <label for="remember-me">Remember Me</label>
            </div>
            <div class="forgot-password">
                <a class="btn" style="color:white; text-decoration:underline;" href="forgot_password.php">Forgot Password</a>
            </div>
            <div class="create-account">
                <span class="btn text-white p-0">Don't Have Account: </span>
                <a class="btn p-0" style="color:white; text-decoration:underline;" href="signup.php">Create One</a>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4 mb-4">
            <input type="submit" class="btn btn-primary" value="Signup">
            <input type="reset" class="btn btn-danger" value="Reset">
        </div>
    </form>
</div>

<?php include "includes/footer.php"; ?>