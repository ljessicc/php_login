<?php
session_start();

$_SESSION['loggedIn'] = true;  

$data= $_POST;

$username = $data['username'];
$password = $data['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

include('database.php');
try {
    $connection = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $exception) {
    $_SESSION['messages'][] = 'connection failed' . $exception->getMessage();
    header('location:login.php');
    exit;
}

  $statement = $connection->prepare('SELECT * FROM users WHERE username = :username');
   $statement->execute([":username" => $username]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(empty($result)){
    $_SESSION['messages'][]= 'User does not exist!';
    header('location:login.php');
    exit;
};
$user = array_shift($result);

if ($user['username'] === $username && password_verify($password,$hash)){
    $_SESSION['username'] = $user['username'];

     header('location:dashboard.php');
    exit;
} else {
    $_SESSION['messages'][]='Incorrect username or Password!';
    header('location:login.php');
    exit;
}
?>