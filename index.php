<?php
try {
    require_once './classes/Database.php';
    require_once './classes/User.php';
    require_once './classes/Session.php';
} catch (\Throwable $th) {
    echo $th->getMessage();
}

Session::start();

// Handle registration logic if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    try {
        $user->register($username, $password);
        echo "User has been registered successfully";
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
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <!-- Submit button -->
        <button type="submit">Register</button>
    </form>
</body>

</html>