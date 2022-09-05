<?php

// logout function

session_start();

// include functions.php

include 'core/functions.php';

// destroy session

session_destroy();

redirect('signin.php');