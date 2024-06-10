<?php
session_start();
session_unset(); // Unset all session variables
session_destroy();



header("location: LoginView.php"); // Redirect to login page
exit();
?>
