<?php

include "includes/header.php";

// include nav

include "includes/nav.php";

include "handlers/handle_update.php";

if(!isset($_SESSION["auth"])) {
    header("Location: signin.php");
}

$data = file_get_contents( "db/data.json" );
$data = json_decode( $data, true );

$i = 1;

?>

<div class = "container-fluid">
    <div class = "row">
        <div class = "col-12">
            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th class="text-white text-center" scope = "col">#</th>
                        <th class="text-white text-center" scope = "col">Username</th>
                        <th class="text-white text-center" scope = "col">Email</th>
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
                                <img src="<?php echo $user['image'] ?>" alt="<?php echo $user['username'] ?>" style="width: 85px; height: 85px;" class="img-fluid mx-auto">
                            </td>
                            <td style="vertical-align: middle">
                                <a type="button" class="btn btn-primary d-block w-50 mx-auto mb-2" data-bs-toggle="modal" name="edit" href="#exampleModal">Edit</a>
                                <a type="button" class="btn btn-danger d-block w-50 mx-auto mb-2" name="delete" href="handlers/handle_delete.php?user_id=<?php echo $user['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit User Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="handlers/handle_update.php?user_id=<?php echo $user['id'] ?>" method="post">
                                            <div class="mb-3">
                                                <input type="text" name="edited_name" placeholder="Username Plz" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <input type="password" name="edited_password" placeholder="New Password Plz" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" name="edited_email" placeholder="New email Plz" class="form-control">
                                            </div>
                                            <div class="modal-footer p-0">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "includes/footer.php"; ?>