<?php

include "includes/header.php";

if(!isset($_SESSION['auth'])) {
    header("Location: signin.php");
}

include "includes/nav.php";

$output = file_get_contents("db/data.json");

$data = json_decode($output, true);

for ($i = 0; $i < count($data); $i++) {
    for ($j = 0; $j < count($_SESSION['auth']); $j++ ){
        if($data[$i]['username'] == $_SESSION['auth'][$j]){
            $image = $data[$i]['image'];
        }
    }
}

?>
    <div class="container-sm h-100">
        <div class="row jsutify-content-center align-items-center">
            <div class="col-12 mt-5 mb-5 w-50 mx-auto text-center">
                <h1 class="display-4 mb-5 border p-3">Profile</h1>

                <div style="background-image: url( '<?php echo $image; ?>' );
                background-size: cover; background-position: center; width: 200px; height: 200px;" class="img-fluid border rounded-circle mb-5 mx-auto"></div>
                
                <h2 class="border p-3 mb-5 bg-success text-white">
                    Name: 
                    <?php echo $_SESSION['auth']['0']; ?>
                </h2>
                <h2 class="border p-3 bg-primary text-white">
                    Email: 
                    <?php echo $_SESSION['auth']['1'];?>
                </h2>
            </div>
        </div>
    </div>

<?php include "includes/footer.php"; ?>