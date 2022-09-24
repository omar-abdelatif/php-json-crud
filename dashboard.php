<?php
include "includes/header.php";
include "includes/nav.php";
if(!isset($_SESSION["auth"])) { header("Location: signout.php"); }
$data = json_decode( file_get_contents( "db/data.json" ), true );
?>
<div class = "container-fluid">
    <div class = "row">
        <div class = "col-12">
            <div class="adduser">
                <a href="adduser.php" class="btn btn-primary mb-3 mt-3">Create User</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-white text-center" scope = "col">#</th>
                        <th class="text-white text-center" scope = "col">Username</th>
                        <th class="text-white text-center" scope = "col">Email</th>
                        <th class="text-white text-center" scope = "col">Password</th>
                        <th class="text-white text-center" scope = "col">Image</th>
                        <th class="text-white text-center" scope = "col">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-white">
                    <?php foreach ( $data as $user ): ?>
                        <tr>
                            <td style="vertical-align: middle">
                                <?php echo $user['id'] ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php echo $user['username'] ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php echo $user['email'] ?>
                            </td>
                            <td style="vertical-align: middle">
                                <?php echo $user['password'] ?>
                            </td>
                            <td style="vertical-align: middle">
                                <img src="<?php echo $user['image'] ?>" alt="<?php echo $user['username'] ?>" title="<?php echo $user['avatar'] ?>" style="width: 85px; height: 85px;" class="img-fluid mx-auto">
                            </td>
                            <td style="vertical-align: middle">
                                <?php if($user['username'] == 'admin'): ?>
                                    <a type="button" class="btn btn-primary d-block w-50 mx-auto mb-2" href="edit_user.php?user_id=<?php echo $user['id'] ?>">Edit</a>
                                <?php else: ?>
                                    <a type="button" class="btn btn-primary d-block w-50 mx-auto mb-2" href="edit_user.php?user_id=<?= $user['id'] ?>">Edit</a>
                                    <a type="button" class="btn btn-danger d-block w-50 mx-auto mb-2" href="handlers/handle_delete.php?user_id=<?= $user['id'] ?>">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>