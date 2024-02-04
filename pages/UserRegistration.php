<?php
require_once 'Database.php';
require_once 'User.php';
require_once 'Session.php';

Session::start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    $user->register($username, $password);

    // Set additional session data or redirect as needed
}
?>

<!-- HTML form for registration -->
<form method="post" action="">
    <!-- Input fields for username and password -->
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>

    <!-- Submit button -->
    <button type="submit">Register</button>
</form>
