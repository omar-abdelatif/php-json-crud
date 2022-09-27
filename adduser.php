<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php if(!isset($_SESSION["auth"])) { header("Location: signout.php"); } ?>
<div class="createUser p-2 mt-3">
    <div class="container">
        <div class="title">
            <h3 class="border p-3 w-50 mx-auto text-center">Create New User</h3>
        </div>
        <form action="handlers/handle_adduser.php" method="post" class="mt-4 d-flex flex-wrap w-100 flex-column justify-content-center" enctype="multipart/form-data">
            <input type="text" name="username" class="form-control w-50 mx-auto mb-4 mt-4" placeholder="Your UserName Plz">
            <input type="text" name="email" class="form-control w-50 mx-auto mb-4" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email Plz">
            <input type="password" name="password" class="form-control w-50 mx-auto mb-4" id="exampleInputPassword1" placeholder="Your Password Plz">
            <input type="file" name="avatar[]" class="form-control w-50 mx-auto mb-4" id="avatar">
            <div class="d-flex justify-content-center mt-4 w-50 mx-auto">
                <input type="submit" name="submit" class="btn btn-primary w-100" value="Signup">
                <input type="reset" class="btn btn-danger w-100" value="Reset">
            </div>
        </form>
    </div>
</div>
<?php include "includes/footer.php" ?>