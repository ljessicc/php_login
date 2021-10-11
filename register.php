<!DOCTYPE html>
<html lang="en">
<?php
$title = 'Register Now!';
$page = 'register';
include('head.php'); ?>

<body>
    <style>
        .container {
            background-color: teal;
            margin-top: 80px;
            width: 870px;
            height: 450px;
            color: white;
            text-align: center;
        }

        form {
            display: block;
            justify-content: center;
            text-align: center;
        }

        form input {
            display: block;
            color: teal;
            margin: auto;
            width: 250px;
            outline: none;
        }

        .submit {
            padding: 10px;
            background-color: paleturquoise;
            color: black;
        }
    </style>

    <?php include('navbar.php');
    ?>



    <!--REGISTRATION FORM -->
    <h5 style="color: red; text-align:center;">
    <?php include_once 'messages.php'; ?>

    </h5>

    <div class="container">
        <h2>Registration Form</h2>
        <form id='register' action='registerProcess.php' method='POST' accept-charset='UTF-8'>
            <fieldset>
                <legend>Register</legend>
                <input type='hidden' name='submitted' id='submitted' value='1' />
                <label for='name'>Your Full Name*: </label>
                <input type='text' name='name' id='name' maxlength="50"  />
             
                <label for='username'>UserName*: </label>
                <input type='text' name='username' id='username' maxlength="50"  />
                
                <label for='email'>Email Address*:</label>
                <input type='text' name='email' id='email' maxlength="50"  />
                
                <label for='password'>Password*: </label>
                <input type='password' name='password' id='password' maxlength="50"  />
                <label for='confirm-password'>Confirm Password*: </label>
                <input type='password' name='confirm-password' id='confirm-password' maxlength="50"  />
                <br>
                <input class="submit" type='submit' name='Submit' value='Submit' />

            </fieldset>
            <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
        </form>

    </div>
    </div>


</body>

</html>