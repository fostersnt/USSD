<?php
try {
    require_once './classes/Database.php';
    require_once './classes/User.php';
    require_once './classes/Session.php';
    require_once './classes/Validations.php';
} catch (\Throwable $th) {
    echo "ERROR MESSAGE: " . $th->getMessage() . "<br>LINE NUMBER: " . $th->getLine();
    // echo "ERROR MESSAGE: " . $th->getMessage() . "\nLINE NUMBER: " . $th->getLine();
}

Session::start();

// Handle registration logic if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = Validations::sanitize_input($_POST['username']);
    $password = Validations::sanitize_input($_POST['password']);


    if (strlen($username) < 1) {
        echo "<span style='color:red'>Invalid username</span><br>";
    }
    $user = new User();
    // $db = new Database();
    try {
        if (strlen($username) > 0 && strlen($password) > 0) {
            
            $user->register($username, $password);
        // $a = "Fasante";
        // $b = "my password";
        // $us = $db->conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        // $us->bind_param("ss", $a, $b);
        // $us->execute();
        // $us->close();

        echo "User has been registered successfully";
        } else {
            echo "<span style='color:red;'>Ensure you have entered valid data for both username and password</span>";
        }
        
    } catch (\Throwable $th) {
        echo $th->getMessage();
    }

    // Set additional session data or redirect as needed
}

// HTML form for registration
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USSD Registration</title>
</head>

<body>
    <h2>User Registration</h2>
    <form method="post" action="">
        <!-- Input fields for username and password -->
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">

        <!-- Submit button -->
        <button type="submit">Register</button>
    </form>
</body>

</html>