<?php

$pages = array();
$pages["index.php"] = "Home";
$pages["login.php"] = "Login";
$pages["register.php"] = "SignUp";

$activePage = "";
?>

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