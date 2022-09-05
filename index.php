<?php

include "includes/header.php";

if (!isset($_SESSION['auth'])) {
    header("Location: signin.php");
}

include "includes/nav.php";

?>

<div class="title d-flex justify-content-center align-items-center h-100">
    <h1 class="display-4">Welcome to your dashboard Ya Bro &#10084;</h1>
</div>

<?php include "includes/footer.php"; ?>