<?php

include 'includes/header.php';

// include nav

include 'includes/nav.php';

include 'handlers/handle_update.php';

if(!isset($_SESSION['auth'])) {
    header("Location: signin.php");
}

?>

<div class = 'container-fluid'>
    <div class = 'row'>
        <div class = 'col-12'>
            <table class='table table-bordered mt-5'>
                <thead>
                    <tr>
                        <th class="text-white text-center" scope = 'col'>#</th>
                        <th class="text-white text-center" scope = 'col'>Username</th>
                        <th class="text-white text-center" scope = 'col'>Email</th>
                        <th class="text-white text-center" scope = 'col'>Image</th>
                        <th class="text-white text-center" scope = 'col'>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center text-white">
                    <?php 
                        $data = file_get_contents( 'db/data.json' );
                        $data = json_decode( $data, true );
                        $i = 1;
                        foreach ( $data as $user ) {
                            if ($user['username'] == 'omar' ){
                                echo "<tr>";
                                echo "<td style='vertical-align: middle' name='row-id'>$user[id]</td>";
                                echo "<td style='vertical-align: middle'>$user[username]</td>";
                                echo "<td style='vertical-align: middle'>$user[email]</td>";
                                echo "<td><img src='$user[image]' alt='$user[username]' style='width: 85px; height: 85px;' class='img-fluid mx-auto'></td>";
                                echo "<td style='vertical-align: middle'>
                                <a type='button' class='btn btn-primary d-block w-50 mx-auto' data-bs-toggle='modal' name='edit' href='#exampleModal'>Edit</a>
                                </td>";
                                echo "</tr>";
                                $i++;
                            } else {
                                echo "<tr>";
                                echo "<td style='vertical-align: middle' name='row-id'>$user[id]</td>";
                                echo "<td style='vertical-align: middle'>$user[username]</td>";
                                echo "<td style='vertical-align: middle'>$user[email]</td>";
                                echo "<td><img src='$user[image]' alt='$user[username]' style='width: 85px; height: 85px;' class='img-fluid mx-auto'></td>";
                                echo "<td style='vertical-align: middle'>
                                <a type='button' class='btn btn-primary d-block w-50 mx-auto mb-2' data-bs-toggle='modal' name='edit' href='#exampleModal'>Edit</a>
                                <a type='button' class='btn btn-danger d-block w-50 mx-auto mb-2' data-bs-toggle='modal' name='edit' href='#checkmsg'>Delete</a>
                                </td>";
                                echo "<div class='modal fade' id='checkmsg' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog modal-dialog-centered'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h5 class='modal-title text-dark' id='exampleModalLabel'>Sure You Want To Delete</h5>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form action='handlers/handle_delete.php?user_id=$user[id]' method='post'>
                                                        <div class='d-flex justify-content-evenly'>
                                                            <input type='submit' class='btn btn-primary' value='Submit'>
                                                            <button type='button' class='btn btn-danger' data-bs-dismiss='modal'>Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                echo "</tr>";
                                $i++;
                            }
                        }
                    ?>
                </tbody>
            </table>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="exampleModalLabel">Edit User Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="handlers/handle_update.php" method="post">
                                <div class="mb-3">
                                    <!-- <?php ?>
                                    <input type='hidden' name='id' placeholder='id' class='form-control' value=''>
                                    <?php ?> -->
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="edited_name" placeholder="Username Plz" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="edited_password" placeholder="New Password Plz" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="edited_email" placeholder="New email Plz" class="form-control">
                                </div>
                                <!-- <div class="mb-3">
                                    <input type="file" name="avatar" class="form-control" id="avatar">
                                </div> -->
                                <div class="modal-footer p-0">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>