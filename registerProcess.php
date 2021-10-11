 <?php
    session_start();

    $data = $_POST;

    if (
        empty($data['name'])
    ){
        $_SESSION['messages'][] = 'Please fill enter name!';
        header('location:register.php');
        exit;
    }; 

    if (
        empty($data['username']) 
    ){
        $_SESSION['messages'][] = 'Please enter username!';
        header('location:register.php');
        exit;
    }; 

    
    if (
        empty($data['email']) 
    ){
        $_SESSION['messages'][] = 'Please enter email!';
        header('location:register.php');
        exit;
    }; 


    if (
        empty($data['password']) 
    ){
        $_SESSION['messages'][] = 'Please create password!';
        header('location:register.php');
        exit;
    }; 

    
    if (
        empty($data['confirm-password']) 
    ){
        $_SESSION['messages'][] = 'Please confirm password!';
        header('location:register.php');
        exit;
    }; 

    if ($data['password'] !== $data['confirm-password']) {
        $_SESSION['messages'][] = 'Password and Confirm password should match!';
        header('location:register.php');
        exit;
    }

    // database 
    $dsn = 'mysql:dbname=userRegistration; host=localhost';
    $dbuser = 'root';
    $dbpassword = 'Klassic,1993';

    try {
        $connection = new PDO($dsn, $dbuser, $dbpassword);
    } catch (PDOException $exception) {
        $_SESSION['messages'][] = 'connection failed' . $exception->getMessage();
        header('location:register.php');
        exit;
    }

    //adding user
$statement = $connection->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
if ($statement) {
   $statement->execute([
        ":email" => $data["email"],
        ":username" => $data["username"]
    ]);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
if(!empty($result)){
    $_SESSION['messages'][]= 'user with username already exists!';
    header('location:register.php');
    exit;
};
}

     $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";

    $statement = $connection->prepare($sql);
    if ($statement) {
        $result =  $statement->execute([
            ":name" => $data["name"],
            ":email" => $data["email"],
            ":username" => $data["username"],
            ":password" => $data["password"]
        ]);
        if($result){
            $_SESSION['messages'][]='Registration successful. You can now log in!';
            header('location:register.php');
            exit; 
        }
    }
    ?>