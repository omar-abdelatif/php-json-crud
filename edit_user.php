<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php if(!isset($_SESSION["auth"])) { header("Location: signout.php"); } ?>
<?php  ?>
<?php
    $id = $_GET['user_id'];
?>
<section class="form">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title mt-5"><h1>Edit User With Id <?= $id ?></h1></div>
                <form action="handlers/handle_update.php?user_id=<?= $id ?>" class="border border-dark border-3 mt-5" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>" class="text-center mb-3" readonly>
                    <input type="text" name="username" class="form-control mb-3" placeholder="Edited UserName">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Edited Email">
                    <input type="password" name="password" class="form-control mb-3" placeholder="Edited Password">
                    <input type="file" name="avatar[]" class="form-control mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>