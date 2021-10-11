<?php 
session_start();

session_destroy();

echo 'Successfully logged out. <br> Try to <a href="login.php">Login</a> again or<br> Return <a href="index.php">Home</a>';

?>