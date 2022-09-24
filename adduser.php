<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php if(!isset($_SESSION["auth"])) { header("Location: signout.php"); } ?>
<div class="createUser p-2 mt-3">
    <div class="title">
        <h3 class="border p-3 w-50 mx-auto text-center">Create New User</h3>
    </div>
</div>