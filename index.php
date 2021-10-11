<?php session_start() ?>;

<!DOCTYPE html>
<html lang="en">
<?php 
$title = 'Home';
$page = 'home';
include('head.php'); ?>

<body>
<?php include('navbar.php');
   ?>
   <style>
      .container {
         background-color: teal;
         border: 7px solid lightslategray;
         width: 870px;
         height: 450px;
         margin-top: 70px;
         color: white;
         text-align: center;
      }
      button{
         border: none;
         border-radius: 5px;
         padding: 5px 10px;
         background-color: lightgreen;
      }
      a{
         color: black;
         font-weight: 800;
      }
   </style>

   <div class="container">
   <h1>Welcome to PHP FORMS</h1>
   <h3>WHERE THINGS HAPPEN</h3>
   <h4>
      <button><a href="login.php">Log in</a></button> if you have an account or <button><a href="register.php">Sign Up</a></button> if you don't!</h4>
   </div>
</body>

</html>