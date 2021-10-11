<?php
session_start();

if(!isset($_SESSION['loggedIn'])){
    session_destroy();
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('head.php');
$title = 'Welcome!';
$page = 'dashboard';
?>
<?php

$pages = array();
$pages["logout.php"] = "Logout";
$pages["dashboard.php"] = "My Account";

$activePage = "";
?>

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



<header class="navbar navbar-default bg-primary navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php foreach ($pages as $url => $title) : ?>
                    <li>
                        <a <?php if ($url === $activePage) : ?>class="active" <?php endif; ?> href="<?php echo $url; ?>">
                            <?php echo $title; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
  
        </div>
    </div>
</header>
    <div class="container">
        <h1>
            <?php echo $_SESSION['username']."'s Products List"?>
        </h1>
                            <ul>
                                <li>A</li>
                                <li>B</li>
                                <li>C</li>
                                <li>D</li>
                            </ul>
    </div>
</body>

</html>