<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php 
$title = 'Login Here!';
$page = 'login';
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
      .form-group-last button{
          background-color: paleturquoise !important;
          color: orchid;
      }
      
   </style>

   <?php include('navbar.php');
   ?>
 <h5 style="color: red; text-align:center;">
    <?php include_once 'messages.php'; ?>

    </h5>
   <div class="container">
   <div class="login-form">
    <form action="loginProcess.php" method="post" enctype="multipart/form-data">
		<h2>Login</h2>
		<p class="hint-text">Enter Login Details</p>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" id="username" placeholder="username" required="required">
        </div>
        
		<div class="form-group">
            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group-last">
            <button type="submit" name="save" class="btn  btn-lg btn-block">Login</button>
        </div>
        <div class="text-center">Don't have an account? <a href="register.php">Register Here</a></div>
    </form>
</div>
   </div>
</body>

</html>