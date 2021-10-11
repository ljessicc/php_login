<?php session_start() ?>;

<!DOCTYPE html>
<html lang="en">
<?php 
$title = 'Home';
$page = 'home';
include('head.php'); ?>

<body>
   <style>
      .container {
         background-color: teal;
         width: 870px;
         height: 450px;
         color: white;
         text-align: center;
      }
   </style>


   <?php include('navbar.php');
   ?>

   <div class="container">
   <h1>Welcome to PHP FORMS</h1>
   <h3>WHERE THINGS HAPPEN</h3>
   <h4>
      <button><a href="login.php">Log in</a></button> if you have an account or <button><a href="register.php">Sign Up</a></button> if you don't!</h4>
   </div>
</body>

</html>