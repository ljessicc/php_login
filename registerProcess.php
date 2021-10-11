 <?php
    session_start();

    //DEFINED VARIABLES
    $data = $_POST;
    $name = $data['name'];
    $username = $data['username'];
    $email = $data['email'];

    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    $password = $data['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT); //to encrypt password
    $confirmPassword = $data['confirm-password'];
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    //NAME VALIDATION
    if (empty($name)) {
        $_SESSION['messages'][] = 'Please fill enter name!';
        header('location:register.php');
        exit;
    };
    if (!preg_match("/^[a-zA-z]*$/", $name)) {
        $_SESSION['messages'][] = 'Only alphabets and whitespaces are allowed';
        header('location:register.php');
        exit;
    }

    //USERNAME VALIDATION

    if (empty($username)) {
        $_SESSION['messages'][] = 'Please enter username!';
        header('location:register.php');
        exit;
    };
    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        $_SESSION['messages'][] = 'Only alphabets and numbers are allowed';
        header('location:register.php');
        exit;
    }

    //EMAIL VALIDATION

    if (empty($email)) {
        $_SESSION['messages'][] = 'Please enter email!';
        header('location:register.php');
        exit;
    };
    if (!preg_match($pattern, $email)) {
        $_SESSION['messages'][] = 'Enter valid email';
        header('location:register.php');
        exit;
    }

    //PASSWORD VALIDATION
    if (empty($password)) {
        $_SESSION['messages'][] = 'Please create password!';
        header('location:register.php');
        exit;
    };
    if (strlen($password) < 8 && strlen($password)>15|| !$number || !$uppercase || !$lowercase || !$specialChars) {
        $_SESSION['messages'][] = 'Password must be at least 8, less than 15 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character!';
        header('location:register.php');
    }

    if (empty($data['confirm-password'])) {
        $_SESSION['messages'][] = 'Please confirm password!';
        header('location:register.php');
        exit;
    };

    if ($password !== $confirmPassword) {
        $_SESSION['messages'][] = 'Password and Confirm password should match!';
        header('location:register.php');
        exit;
    }

    include('database.env');
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
        if (!empty($result)) {
            $_SESSION['messages'][] = 'user with username already exists!';
            header('location:register.php');
            exit;
        };
    }

    $sql = "INSERT INTO users (name, username, email, password) VALUES (:name, :username, :email, :password)";

    $statement = $connection->prepare($sql);
    if ($statement) {
        $result =  $statement->execute([
            ":name" => $name,
            ":email" => $email,
            ":username" => $username,
            ":password" => $hash
        ]);
        if ($result) {
            $_SESSION['messages'][] = 'Registration successful. You can now log in!';
            header('location:register.php');
            exit;
        }
    }
    ?>